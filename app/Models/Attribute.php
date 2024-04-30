<?php

namespace App\Models;

use App\Rules\urllist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Attribute extends Mymodel
{
    use HasFactory;


    protected $fillable = [
        'name',
        'odoo_name',
        'comment',
        'required',
        'attribute_list_id',
        'unit_id',
        'user_id',
        'data_type_id',
        'sort'
    ];

    protected $casts = [
        'required' => 'bool',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function dataType(): BelongsTo
    {
        return $this->belongsTo(DataType::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function attributeList(): BelongsTo
    {
        return $this->belongsTo(AttributeList::class);
    }

    public function save(array $options = [])
    {
        $this->applyLogic();
        return parent::save($options);
    }

    public function applyLogic()
    {
        if ($this->required == null)
            $this->required = false;

        // logique
        if ($this->data_type_id == 1)
            $this->unit_id = null;
        if ($this->data_type_id  != 1)
            $this->attribute_list_id = null;

        // mise en forme nom
        $this->name = Str::of($this->name)->slug('-');
    }

    public function getNameOrOdooName()
    {
        if ($this->odoo_name)
            return $this->odoo_name;
        else
            return $this->name;
    }

    public static function getNameOrOdooNameFromId($attribute_id,&$name = null)
    {
        $attribute = Attribute::where('id', $attribute_id)->first();
        if (!$attribute_id)
            abort(404, "the odooAttribute ".$attribute. " does not exist.");

        if (isset($name))
            $name = $attribute->name;

        return $attribute->getNameOrOdooName();
    }

    public static function formatValue($attribute_name,$value)
    {
        $name = "";
        // formatage de la surface
        if ($attribute_name == 'var-surface-m2')
        {
            $numeric_value = (float)$value;
            $name = number_format($numeric_value, 1, '.', '');
        }
        elseif (in_array($attribute_name, ['var-size-m','var-size-cm','var-size-mm','var-surface-cm2','var-volume-l']))
        {
            $numeric_value = (float)$value;
            $name = number_format($numeric_value, 0, '.', '');
        }
        elseif ($attribute_name == 'var-size-ft')
        {
            $str = str_replace("''","'",$value);
            $str = str_replace(".","'",$str);
            $str = str_replace('"',"'",$str);
            $parts = explode("'",$str);
            $rad = (int)$parts[0];
            $dec = 0;
            if (isset($parts[1])) {
                $dec = (int)$parts[1];
                if ($dec > 11)
                {
                    $dec = 11;
                }
            }
            $name = (string)$rad;
            if ($dec > 0) {
                $name.= "'".(string)$dec;
            }
        }
        elseif ($attribute_name == 'var-size-inch')
        {
            $str = str_replace("''","'",$value);
            $str = str_replace(".","'",$str);
            $str = str_replace('"',"'",$str);
            $parts = explode("'",$str);
            $rad = (int)$parts[0];
            $dec = 0;
            if (isset($parts[1])) {
                $dec = (int)$parts[1];
                if ($dec > 11)
                {
                    $dec = 11;
                }
            }
            $name = (string)$rad;
            if ($dec > 0) {
                $name.= '"';
                switch ($dec) {
                    case 1;
                    case 2;
                    case 3;
                        $name.= ' 1/4';
                        break;
                    case 6;
                    case 4;
                    case 5;
                    case 7;
                        $name.= ' 1/2';
                        break;
                    case 8;
                    case 9;
                    case 10;
                    case 11;
                        $name.= ' 3/4';
                        break;
                }
            }
        }
        else
        {
            $name = (string)$value;
        }
        return $name;
    }

    public function getValidationRule() {
        if ($this->dataType->name == 'selection') {
            $validationRules[] = Rule::exists('attribute_list_values', 'name')
                ->where('attribute_list_id', $this->attribute_list_id);
        }
        $validationRules[] = ($this->required == 1) ? 'required' : 'nullable';

        // gestion du pipe dans les regex (echappé avec u backslash)
        $ruleStr = str_replace('\|','¥',$this->dataType->validation_str);
        $additionnalRules = explode('|', $ruleStr);
        for ($i = 0; $i < count($additionnalRules); $i++) {
            $additionnalRules[$i] = str_replace('¥','|',$additionnalRules[$i]);
        }

        if (in_array('urllist',$additionnalRules))
        {
            $key = array_search('urllist',$additionnalRules);
            $additionnalRules[$key] = new urllist;
        }
        $validationRules = array_merge($validationRules,$additionnalRules);

        //log:debug($validationRules);
        return $validationRules;
    }

    public function getVariantAttributeValueData($bulk_value,$target_variant_id)
    {
        if (!$bulk_value)
            abort(500, "Null bulk_value for ".$this->name);

        $variantAttributeValueArr = [];
        $variantAttributeValueArr['variant_id'] = $target_variant_id;
        $variantAttributeValueArr['attribute_id'] = $this->id;

        // correction des numériques avec virgule
        if (str_contains($this->dataType->validation_str,'numeric') and str_contains($bulk_value,','))
        {
            $bulk_value = str_replace(',', '.', $bulk_value);
        }

        switch ($this->dataType->name) {
            case "selection":
                $value_id = AttributeListValue::where('name', '=',$bulk_value)
                    ->where('attribute_list_id',$this->attribute_list_id)
                    ->pluck('id')->first();
                $variantAttributeValueArr['value_int'] = $value_id;
                break;
            case "string":
            case "double":
                $variantAttributeValueArr['value_str'] = (string)$bulk_value;
                break;
            case "text":
            case "url":
                $variantAttributeValueArr['value_txt'] = (string)$bulk_value;
                break;
            case "integer":
            case "boolean":
            case "year":
                $variantAttributeValueArr['value_int'] = (int)$bulk_value;
                break;
            case "float":
            case "percent":
                $variantAttributeValueArr['value_float'] = round((float)$bulk_value,4);
                break;
            case "money":
                $variantAttributeValueArr['value_float'] =round((float)$bulk_value,2);
                break;
            case "feet":
                $parts = explode("'",$bulk_value);
                if ($parts === [])
                    $feet = $bulk_value;
                else
                    $feet = $parts[0];
                $inches = '0';
                if (count($parts)>1 and strlen($parts[1]) > 0)
                    $inches = $parts[1];
                $variantAttributeValueArr['value_str'] = $feet."'".$inches;
                break;
            case "inch":
                $parts = explode('"',$bulk_value);
                if ($parts === [])
                    $inches = $bulk_value;
                else
                    $inches = $parts[0];
                $dec = '0';
                if (count($parts)>1 and strlen($parts[1]) > 0)
                    $dec = $parts[1];
                //log::debug($bulk_value."-".$inches."-".$dec);
                $variantAttributeValueArr['value_str'] = $inches.'"'.$dec;

                break;
            default:
                abort(500, "loadValue : dataType ".$this->dataType->name." non pris en charge");
        }

        return $variantAttributeValueArr;
    }


}
