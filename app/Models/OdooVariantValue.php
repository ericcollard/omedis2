<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OdooVariantValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'variant_id',
        'odoo_model_id',
        'value',
        'attribute_name'
    ];


    public function variant(): BelongsTo
    {
        return $this->belongsTo(Variant::class);
    }

    public function odooModel(): BelongsTo
    {
        return $this->belongsTo(OdooModel::class);
    }

    public function to_array()
    {
        $data = [];
        if ($this->odooModel->name == 'attribute')
        {
            $data['attribute_'.$this->attribute_name] = $this->value;
        }
        else
        {
            $data[$this->odooModel->name] = $this->value;
        }
        return $data;
    }

    public function toString()
    {
        $html = '';
        if ($this->odooModel->name == 'attribute')
        {
            $html .= '<strong>'.'attribute_'.$this->attribute_name.'</strong>';
        }
        else
        {
            $html .= '<strong>'.$this->odooModel->name.'</strong>';
        }
        $html .= ': '.$this->value;
        return $html;
    }



    public static function createFromModel($odoo_model_name, $variant_id, $value, $attribute_name = null)
    {
        $odooModel = OdooModel::where('name', $odoo_model_name)->first();
        if ($odooModel)
        {
            $data =[
                'variant_id' => $variant_id,
                'odoo_model_id' => $odooModel->id,
                'value' => $odooModel->format_value($value)
            ];
            if ($attribute_name)
                $data['attribute_name'] = $attribute_name;

            $obj = OdooVariantValue::create($data)->save();
        }
        else
        {
            abort(404, $odoo_model_name. " odoo model name does not exist.");
        }

    }
}
