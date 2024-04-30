<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VariantAttributes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'variant_id',
        'attribute_id',
        'value_str',
        'value_txt',
        'value_int',
        'value_float',
    ];

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    public function variant(): BelongsTo
    {
        return $this->belongsTo(Variant::class);
    }

    public function getValue()
    {
        switch ($this->attribute->datatype->name)
        {
            case "selection":
                if ($this->value_int)
                {
                    $attr_value = DB::table('attribute_list_values')
                        ->where('attribute_list_values.attribute_list_id',$this->attribute->attribute_list_id)
                        ->where('attribute_list_values.id',$this->value_int)
                        ->select('name','odoo_name')
                        ->first();
                    if ($attr_value)
                    {
                        if ($attr_value->odoo_name) {
                            return $attr_value->odoo_name;
                        }
                        else
                        {
                            return $attr_value->name." *";
                        }
                    }
                    else
                        return null;
                }
                break;
            case "string":
            case "feet":
            case "inch":
            case "double":
                if ($this->value_str)
                {
                    return $this->value_str;
                }
                break;
            case "integer":
            case "boolean":
            case "year":
                if ($this->value_int)
                {
                    return $this->value_int;
                }
                break;
            case "float":
            case "percent":
            case "float":
            case "money":
                if ($this->value_float)
                {
                    return $this->value_float;
                }
                break;
            case "text":
            case "url":
                if ($this->value_txt)
                {
                    return $this->value_txt;
                }
                break;
            default:
                return 'getValue > unknown type';
                break;
        }
        return null;
    }

    public function toString($summary = 0)
    {
        $html = "";
        if ($summary == 0)
            $html .= "<strong>".$this->attribute->name."</strong>: ";
        switch ($this->attribute->datatype->name)
        {
            case "selection":
                if ($this->value_int)
                {
                    $attrValue = $this->attribute->attributeList->attributeListValues->where('id', $this->value_int)->first();
                    if ($attrValue)
                        $html .= $attrValue->name;
                    else
                        $html .= "nc.";
                }

                break;
            case "string":
            case "feet":
            case "inch":
            case "double":
                if ($this->value_str)
                {
                    $html .= $this->value_str;
                    if ($this->attribute->unit and $this->attribute->unit->name != 'none') $html .= $this->attribute->unit->name;
                }
                break;
            case "integer":
            case "boolean":
                if ($this->value_int)
                {
                    $html .= $this->value_int;
                    if ($this->attribute->unit and $this->attribute->unit->name != 'none') $html .= $this->attribute->unit->name;
                }
                break;
            case "float":
                if ($this->value_float)
                {
                    $html .= $this->value_float;
                    if ($this->attribute->unit and $this->attribute->unit->name != 'none') $html .= $this->attribute->unit->name;
                }
                break;
            case "percent":
                if ($this->value_float)
                {
                    $html .= (string)($this->value_float * 100.0).'%';
                }
                break;
            case "money":
                if ($this->value_float)
                {
                    $html .= $this->value_float;
                    if ($this->attribute->unit and $this->attribute->unit->name != 'none') $html .= $this->attribute->unit->name;
                }
                break;
            case "text":
                if ($this->value_txt)
                {
                    $html .= $this->value_txt;
                    if ($this->attribute->unit and $this->attribute->unit->name != 'none') $html .= $this->attribute->unit->name;
                }
                break;
            case "url":
                if ($this->value_txt)
                {
                    $pictsArr = explode(";", $this->value_txt);
                    foreach ($pictsArr as $picUrl)
                    {
                        $html .= "<img src='".$picUrl."' width = 50 height = 50 max-width=50>";
                    }

                }
                break;
            default:
                $html .= 'toString > unknown type';
                break;
        }
        return $html;
    }
}
