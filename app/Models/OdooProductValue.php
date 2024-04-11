<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OdooProductValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'product_id',
        'odoo_model_id',
        'value'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function odooModel(): BelongsTo
    {
        return $this->belongsTo(OdooModel::class);
    }

    public static function createFromModel($odoo_model_name, $product_id, $value)
    {
        $odooModel = OdooModel::where('name', $odoo_model_name)->first();
        if ($odooModel)
        {
            $data =[
                'product_id' => $product_id,
                'odoo_model_id' => $odooModel->id,
                'value' => $odooModel->format_value($value)
            ];
            $obj = OdooProductValue::create($data)->save();
        }
        else
        {
            abort(404, $odoo_model_name. " odoo model name does not exist.");
        }

    }

    public function toString()
    {
        $html = '';
        $html .= '<strong>'.$this->odooModel->name.'</strong>';
        $html .= ': '.$this->value;
        return $html;
    }
}
