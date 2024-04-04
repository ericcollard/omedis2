<?php

namespace App\Models;

use App\Imports\ImportHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
    ];

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($product) {
            foreach($product->variants as $variant) {
                $variant->delete();
            }
            foreach($product->odooProductValues as $odooProductValue) {
                $odooProductValue->delete();
            }
        });
    }

    public static function truncate()
    {
        $products = self::where('user_id','=',ImportHelpers::getCurrentUserIdOrAbort())
            ->get();
        foreach ($products as $product)
            $product->delete();
    }

    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getVariantCount() {
        return $this->variants()->count();
    }

    public function odooProductValues(): HasMany
    {
        return $this->hasMany(OdooProductValue::class);
    }

    public function toString($summary = 0)
    {
        $html = "";
        $MainAttributes = Attribute::whereIn('name',['brand','season','name'])->get();
        foreach ($MainAttributes as $key => $MainAttribute)
        {
            $variantAttribute = $this->variants[0]->variantAttributes->where('attribute_id',$MainAttribute->id)->first();
            if (strlen($html) > 0)
                $html .= " - ";
            if ($variantAttribute)
                $html .=$variantAttribute->toString($summary);
        }
        return $html;
    }

    public function getOdooProductValue($odoo_model_name)
    {
        $odooModelObj = DB::table('odoo_models')
            ->where('name',$odoo_model_name)
            ->select('id')
            ->first();
        if (!$odooModelObj)
            abort(404, "the odoo ".$odoo_model_name. " model does not exist.");

        $odooProductValueObj = OdooProductValue::where('product_id',$this->id)
            ->where('odoo_model_id',$odooModelObj->id)
            ->select('value')
            ->first();

        if ($odooProductValueObj)
        {
            return $odooProductValueObj->value;
        }
        return null;
    }

    public function hasVariantsMultipleValues($attribute_name)
    {
        // si différentes valeurs pour chaque variante
        $attributeObj = DB::table('attributes')
            ->where('name',$attribute_name)
            ->select('id')
            ->first();

        if (!$attributeObj)
            abort(404, "the ".$attribute_name. " does not exist.");

        $cnt = 1;
        $a = variantAttributes::where('attribute_id',$attributeObj->id)
            ->whereIn('variant_id', $this->variants()->pluck('id'))
            ->select('value_float')
            ->distinct()
            ->pluck('value_float');

        if ($a)
            $cnt = count($a);

        //log::debug($a);
        return ($cnt > 1);
    }

    public function getVariantsMinAttributeValue($attribute_name)
    {
        $attribute = Attribute::where('name', $attribute_name)->first();
        $value = variantAttributes::where('attribute_id',$attribute->id)
            ->whereIn('variant_id', $this->variants()->pluck('id'))
            ->min('value_float');

        return $value;

    }

    public function convert2odoo()
    {
        // Suppression des données déjà existantes
        foreach($this->odooProductValues as $odooProductValue) {
            $odooProductValue->delete();
        }

        $first_variant = $this->variants()->first();

        // partie product_template

        //Catégorie commerciale
        $variantAttributeValue = $first_variant->getVariantAttributeValue('category');
        if ($variantAttributeValue)
            OdooProductValue::createFromModel('commercial_category', $this->id, $variantAttributeValue);


        //Référence interne
        if ($this->getVariantCount() == 1)
        {
            $ean = "";
            $variantAttributeValue = $first_variant->getVariantAttributeValue('sku');
            if ($variantAttributeValue)
            {
                OdooProductValue::createFromModel('product_internal_ref', $this->id, $variantAttributeValue);
                $ean = $variantAttributeValue;
            }

            //Code barre
            $variantAttributeValue = $first_variant->getVariantAttributeValue('ean');
            if ($variantAttributeValue)
            {
                $ean = $variantAttributeValue;
            }

            if (strlen($ean)>0)
                OdooProductValue::createFromModel('product_barcode', $this->id, $ean);


        }

        //Nom produit
        $productName = $first_variant->getVariantAttributeValue('name');
        $brandName = $first_variant->getVariantAttributeValue('brand');
        $seasonName = $first_variant->getVariantAttributeValue('season');
        if ($productName)
        {
            $fullproductName = strtoupper($productName);
            if (isset($brandName)) $fullproductName = ucfirst(strtolower($brandName))." ".$fullproductName;
            if (isset($seasonName)) $fullproductName = $fullproductName." ".$seasonName;

            OdooProductValue::createFromModel('product_name', $this->id, $fullproductName);
        }

        //Marque
        if ($brandName)
            OdooProductValue::createFromModel('brand_name', $this->id, $brandName);

        //Description
        $variantAttributeValue = $first_variant->getVariantAttributeValue('description-short-fr');
        if ($variantAttributeValue)
        {
            if (strlen($variantAttributeValue) > 30)
                $variantAttributeValue = substr($variantAttributeValue,0,30)." ...";
            OdooProductValue::createFromModel('sale_description', $this->id, $variantAttributeValue);
        }

        $variantAttributeValue = $first_variant->getVariantAttributeValue('description-long-fr');
        if ($variantAttributeValue)
            OdooProductValue::createFromModel('website_description', $this->id, $variantAttributeValue);


        // si 1 seule variante ou même tarif achat pour chaque variante
        if (!$this->hasVariantsMultipleValues('wholesale-price'))
        {
            // appliquer la remise b2b !!!
            $discountedB2bPcValue = $first_variant->getVariantAttributeValue('discount-b2b-pc');
            $variantAttributeValue = $first_variant->getVariantAttributeValue('wholesale-price');
            if ($discountedB2bPcValue)
                $variantAttributeValue =  $variantAttributeValue * (1-$discountedB2bPcValue);
            OdooProductValue::createFromModel('product_wholesale_ht', $this->id, $variantAttributeValue);
        }

        //Prix vente HT = prix mini des variantes
        $value = $this->getVariantsMinAttributeValue('retail-price');
        if ($value) {
            $value = $value / 1.2;
            OdooProductValue::createFromModel('product_retail_ht', $this->id, $variantAttributeValue);
        }

        //Prix discount HT = prix mini des variantes, si chaque variante a un prix promo
        $attribute = Attribute::where('name', 'discount-b2c')->first();
        $nb_values =  variantAttributes::where('attribute_id',$attribute->id)
            ->whereIn('variant_id', $this->variants()->pluck('id'))->count();
        if ($nb_values == $this->getVariantCount())
        {
            $value = $this->getVariantsMinAttributeValue('discount-b2c');
            if ($value) {
                $value = $value / 1.2;
                OdooProductValue::createFromModel('product_discount_ht', $this->id, $value);
            }
        }

        //Photos
        $variantAttributeValue = $first_variant->getVariantAttributeValue('pictures');
        if ($variantAttributeValue) {
            $picturePathArr = explode(';',$variantAttributeValue);
            $mainPict = "";
            $additionnalPict = "";
            if (count($picturePathArr) >= 1)
            {
                $mainPict = $picturePathArr[0];
                $additionnalPict = implode(';',array_slice($picturePathArr,1));
            }

            if (strlen($mainPict) > 0)
                OdooProductValue::createFromModel('main_picture', $this->id, $mainPict);

            //Photos additionnelles
            if (strlen($additionnalPict) > 0)
                OdooProductValue::createFromModel('alternative_pictures', $this->id, $additionnalPict);
        }

        //Route
        OdooProductValue::createFromModel('route', $this->id, 'Acheter');

        //Type odoo
        OdooProductValue::createFromModel('type', $this->id, 'ARTICLE STOCKABLE');

        //Taxe
        OdooProductValue::createFromModel('tax', $this->id, 'TVA 20%');

        // conversion des variantes
        $variants = $this->variants()->get();
        foreach($variants as $variant)
        {
            $variant->convert2odoo();
        }
    }

    public function odoodata_to_array()
    {
        $data = [];
        foreach ($this->odooProductValues as $odooProductValue)
        {
            $data[$odooProductValue->odooModel->name] = $odooProductValue->value;
        }
        return $data;
    }
}
