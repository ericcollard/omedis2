<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Variant extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'product_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($variant) {
            foreach($variant->variantAttributes as $variantAttribute) {
                $variantAttribute->delete();
            }
            foreach($variant->odooVariantValues as $odooVariantValue) {
                $odooVariantValue->delete();
            }
        });

    }

    public function variantAttributes(): HasMany
    {
        return $this->hasMany(VariantAttributes::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function odooVariantValues(): HasMany
    {
        return $this->hasMany(OdooVariantValue::class);
    }

    public function getVariantAttributeValue($attribute_name)
    {
        $attribute = Attribute::where('name', $attribute_name)->first();
        $variantAttributeObj = $this->variantAttributes()->where('attribute_id',$attribute->id)->first();
        if ($variantAttributeObj)
        {
            return $variantAttributeObj->getValue();
        }
        return null;
    }

    public function getVariantOdooAttributeValue($attribute_name)
    {
        $attribute = OdooModel::where('name', $attribute_name)->first();
        $variantAttributeObj = $this->odooVariantValues()->where('odoo_model_id',$attribute->id)->first();
        if ($variantAttributeObj)
        {
            return $variantAttributeObj->value;
        }
        return null;
    }

    public function getVariantAttributeValueFromId($attribute_id)
    {
        $variantAttributeObj = $this->variantAttributes()->where('attribute_id',$attribute_id)->first();
        if ($variantAttributeObj)
        {
            return $variantAttributeObj->getValue();
        }
        return null;
    }

    public function convert2odoo()
    {
        // Suppression des données déjà existantes
        foreach ($this->odooVariantValues as $odooProductValue) {
            $odooProductValue->delete();
        }

        if ($this->product->getVariantCount() > 1)
        {
            $ean = "";

            // Référence interne variante
            $variantAttributeValue = $this->getVariantAttributeValue('sku');
            if ($variantAttributeValue)
            {
                OdooVariantValue::createFromModel( 'variant_internal_ref',$this->id,$variantAttributeValue);
                $ean = $variantAttributeValue;
            }

            //Code barre variante (dans tous les cas, si vide, on met de sku)
            $variantAttributeValue = $this->getVariantAttributeValue('ean');
            if ($variantAttributeValue)
                $ean = $variantAttributeValue;

            if (strlen($ean)>0)
                OdooVariantValue::createFromModel( 'variant_barcode',$this->id,$ean);


            //Tarif achat
            $purchasePrice = false;
            $discountedB2bPriceValue = $this->getVariantAttributeValue('discount-b2b');
            if ($discountedB2bPriceValue)
            {
                $purchasePrice = $discountedB2bPriceValue;
            }
            else
            {
                $wholesalePriceValue = $this->getVariantAttributeValue('wholesale-price');
                $discountedB2bPcValue = $this->getVariantAttributeValue('discount-b2b-pc');
                if ($discountedB2bPcValue)
                    $purchasePrice = $wholesalePriceValue * (1-$discountedB2bPcValue);
                else
                    $purchasePrice = $wholesalePriceValue;
            }

            // cout variante (sera mis à jour si stock null)
            if ($purchasePrice)
                OdooVariantValue::createFromModel( 'variant_cost_ht',$this->id,$purchasePrice);

            // si différents tarif achat pour chaque variante
            //if (!$this->product->hasSameWholesalePrice() and $purchasePrice)
            if ($this->product->hasVariantsMultipleValues('wholesale-price') and $purchasePrice)
                OdooVariantValue::createFromModel( 'variant_wholesale_ht',$this->id,$purchasePrice);


            // si différents tarif promo pour chaque variante
            if ($this->product->hasVariantsMultipleValues('discount-b2c')) {
                $value = $this->getVariantAttributeValue('discount-b2c');
                if ($value) {
                    $value = $value / 1.2;
                    OdooVariantValue::createFromModel( 'variant_discount_ht',$this->id,$value);
                }
            }


            // si différents tarif public pour chaque variante
            if ($this->product->hasVariantsMultipleValues('retail-price')) {
                $value = $this->getVariantAttributeValue('retail-price');
                if ($value) {
                    $value = $value / 1.2;
                    OdooVariantValue::createFromModel( 'variant_retail_ht',$this->id,$value);
                }
            }
        }


        // Poids
        $variantAttributeValue = $this->getVariantAttributeValue('weight');
        if ($variantAttributeValue)
            OdooVariantValue::createFromModel( 'variant_weight',$this->id,$variantAttributeValue);

        // Volume
        OdooVariantValue::createFromModel( 'variant_volume',$this->id,0);

        //Marque
        $variantAttributeValue = $this->getVariantAttributeValue('brand');
        if ($variantAttributeValue)
            OdooVariantValue::createFromModel( 'attribute',$this->id,$variantAttributeValue,'Marque');


        //Millésime
        $variantAttributeValue = $this->getVariantAttributeValue('season');
        if ($variantAttributeValue)
            OdooVariantValue::createFromModel( 'attribute',$this->id,(string)$variantAttributeValue,'Millésime');


        //Photos
        $variantAttributeValue = $this->getVariantAttributeValue('pictures');
        if ($variantAttributeValue) {
            $picturePathArr = explode(';',$variantAttributeValue);
            $mainPict = "";
            if (count($picturePathArr) >= 1)
                $mainPict = $picturePathArr[0];

            if (strlen($mainPict) > 0)
            {
                $productMainPictureValue = $this->product->getOdooProductValue('main_picture');
                // ne l'ajouter que si ce n'est pas la même que sur le produit principal
                if ($productMainPictureValue) {
                    if ($productMainPictureValue == $mainPict) {
                        $mainPict = "";
                    }
                }

                if (strlen($mainPict)> 0) {
                    OdooVariantValue::createFromModel( 'variant_picture',$this->id,$mainPict);
                }

            }
        }

        //Type
        OdooVariantValue::createFromModel( 'attribute',$this->id,'Neuf','Type');


        //Autres attributs
        // Attributs variantes
        $attribute_ids = DB::table('attributes')
            ->select('attributes.id')
            ->join('variant_attributes', 'variant_attributes.attribute_id', '=', 'attributes.id')
            ->where('variant_attributes.variant_id','=',$this->id)
            ->Where(function ($query) {
                $query->whereNotNull('variant_attributes.value_str')
                    ->orWhereNotNull('variant_attributes.value_txt')
                    ->orWhereNotNull('variant_attributes.value_int')
                ->orWhereNotNull('variant_attributes.value_float');
            })
            ->whereNotNull('attributes.odoo_name')
            ->pluck('id');

        foreach ($attribute_ids as $attribute_id) {
            $attrName = "";
            $attribute_odoo_name = Attribute::getNameOrOdooNameFromId($attribute_id,$attrName);
            $value = $this->getVariantAttributeValueFromId($attribute_id);
            if ($value) {
                // gestion des spécifictés de format pou chaque type de d'attribut
                $name = Attribute::formatValue($attrName,$value);
                if (strlen($name) > 0) {
                    OdooVariantValue::createFromModel( 'attribute',$this->id,$name,$attribute_odoo_name);
                }
            }
        }
    }

    public function odoodata_to_array()
    {
        $data = [];
        foreach ($this->odooVariantValues as $odooVariantValue)
        {
            if ($odooVariantValue->odooModel->name == 'attribute')
            {
                $data['attribute_'.$odooVariantValue->attribute_name] = $odooVariantValue->value;
            }
            else
            {
                $data[$odooVariantValue->odooModel->name] = $odooVariantValue->value;
            }
        }
        return $data;
    }

    public function toString($odoo = 0,$image = 0) {
        $html = '';
        if ($odoo == 0)
        {
            // Extraction des données standard
            foreach ($this->variantAttributes()->get() as $variantAttribute)
            {
                if (!in_array($variantAttribute->attribute->name,['brand','season','name','category']))
                {
                    $html.= $variantAttribute->toString().' / ';
                }
            }
        }
        else
        {
            if ($image == 0)
            {
                // Extraction des données odoo
                $html .= '<ul>';
                foreach ($this->odooVariantValues()->get() as $odooVariantValue)
                {
                    $html .= '<li class="ml-4">';
                    $html.= $odooVariantValue->toString();
                    $html .= '</li>';
                }
                $html .= '</ul>';
            }
            else
            {
                $pictures = $this->getVariantOdooAttributeValue('variant_picture');
                if ($pictures)
                {
                    $html .= '<img src="'.$pictures.'" style="height:200px">';
                }
            }
        }

        return $html;
    }

}
