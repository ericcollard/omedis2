<?php

namespace App\Imports;

use App\Models\Attribute;
use Carbon\Carbon;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;


class ImportHelpers
{
    public static function truncate_table()
    {
        log::debug('Empty product_bulk_import table or the current user');
        DB::table('product_bulk_import')->where('user_id', '=', self::getCurrentUserIdOrnull())->delete();
    }

    public static function initialize_table()
    {
        self::drop_table();
        self::create_table();
    }

    public static function check_table()
    {
        return Schema::hasTable('product_bulk_import');
    }

    public static function drop_table()
    {
        return Schema::dropIfExists('product_bulk_import');
    }

    public static function create_table()
    {
        Schema::create('product_bulk_import', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('user_id');
            $table->integer('product_id')->nullable();
            $table->integer('line_number')->nullable();
            $table->integer('order')->nullable();
            $table->string('report',1000)->nullable();
            $table->string('warning',1000)->nullable();
            $attributes = Attribute::all();
            foreach ($attributes as $attribute)
            {
                switch ($attribute->dataType->name)
                {
                    case 'selection':
                    case 'string':
                    case 'boolean':
                    case 'integer':
                    case 'year':
                    case 'float':
                    case 'inch':
                    case 'feet':
                    case 'double':
                    case 'percent':
                    case 'money':
                        $table->string($attribute->name)->nullable();
                        break;
                    case 'url':
                    case 'text':
                        $table->text($attribute->name)->nullable();
                        break;
                }
            }
        });
        log::debug('Datatable product_bulk_import created');
    }

    public static function getCurrentUserIdOrAbort()
    {
        if (auth()->check())
        {
            $current_user_id = auth()->user()->id;
        }
        else
        {
            abort(500, "User not logged.");
        }
        return $current_user_id;
    }

    public static function getCurrentUserIdOrnull()
    {
        if (auth()->check())
        {
            $current_user_id = auth()->user()->id;
        }
        else
        {
            $current_user_id = 0;
        }
        return $current_user_id;
    }

    public static function bulkImport($filePath,$disk)
    {
        $path_parts = pathinfo($filePath);
        $ext = strtoupper($path_parts['extension']);
        switch ($ext){
            case 'CSV':
            case 'XLS':
            case 'XLSX':
                Excel::import(new ProductsImport, $filePath, $disk);
                break;
            case 'XML':
                ProductsXmlImport::process($filePath, $disk);
                break;
        }
    }

    public static function resetError()
    {
        DB::table('product_bulk_import')
            ->update(['report' => null]);
    }

    public static function normalizeSeparator2SemiColumn($value)
    {
        return str_replace(',',';',$value);
    }

    public static function registerError($lineID,$message,$attributeName,$value,$field = 'report')
    {

        $existing_text = DB::table('product_bulk_import')
            ->where('id', $lineID)->select($field)->first();

        if ($existing_text->{$field})
            $final_text =$existing_text->{$field}.'|';
        else
            $final_text = '';

        $final_text = $final_text.$message.'#'.$attributeName.'#'.$value;

        $affected = DB::table('product_bulk_import')
            ->where('id','=' ,$lineID)
            ->update([$field => $final_text]);//DB::raw( "concat(ifnull(errors,''),'".$message."')")
    }

    public static function checkMandatoryAttributes()
    {
        // vérification attributs obligatoires
        $mandatory_attributes_array = Attribute::select('name')->where('required','=',1)->get()->pluck('name')->toArray();

        foreach ($mandatory_attributes_array as $attribute)
        {
            $invalids = DB::table('product_bulk_import')
                ->where($attribute,'=','')
                ->where('user_id','=',ImportHelpers::getCurrentUserIdOrnull())
                ->orWhereNull($attribute)
                ->get();
            foreach ($invalids as $invalid)
            {
                $lineId = ((array)$invalid)['id'];
                $error_report = 'Required attribute <strong>'.$attribute.'</strong> not filled';
                ImportHelpers::registerError($lineId,$error_report,$attribute,'');
            }

        }
        log::debug('Mandatory attributes checked');
    }

    public static function checkMandatoryCombinedAttributes()
    {
        // vérification des combinés obligatoires
        // sku + generic-ref
        $invalids = DB::table('product_bulk_import')
            ->where('user_id','=',ImportHelpers::getCurrentUserIdOrnull())
            ->WhereNull('sku')
            ->WhereNull('generic-ref')
            ->get();
        foreach ($invalids as $invalid)
        {
            $lineId = ((array)$invalid)['id'];
            $error_report = 'Combinated requirement : <strong>sku</strong> and <strong>generic-ref</strong> not filled. Please supply one of each.';
            ImportHelpers::registerError($lineId,$error_report,'sku or generic-ref','');
        }

        log::debug('Combinated Mandatory attributes checked');
    }

    public static function detectProductsAndSort()
    {
        //select concat(brand,name,ifnull(season,'')) as ftt, `wholesale-price`,id from product_bulk_import order by ftt,`wholesale-price`,id
        $items = DB::table('product_bulk_import')
            ->select("id","wholesale-price",DB::raw("CONCAT(brand,name,ifnull(season,'')) as full_name"))
            ->where('user_id','=',ImportHelpers::getCurrentUserIdOrnull())
            ->orderBy('full_name','asc')
            ->orderBy('wholesale-price','asc')
            ->orderBy('id','asc')
            ->get();

        // détection
        $lastFullName = '';
        $product_id = 0;
        $order_id = 0;
        $datas = [];
        foreach ($items as $item)
        {
            $currentFullName = $item->full_name;
            if ($currentFullName != $lastFullName)
                $product_id++;
            $order_id++;
            $id = $item->id;
            $datas[] = [$id,$product_id,$order_id];
            $lastFullName = $currentFullName;
        }

        // update
        foreach ($datas as $data) {
            DB::table('product_bulk_import')
                    ->where('id','=',$data[0])
                    ->update([
                        'product_id' => $data[1],
                        'order' => $data[2],
                    ]);
        }
        log::debug('Products detected and sorted');
    }

    public static function numberOfDecimals($value)
    {
        if ((int)$value == $value)
        {
            return 0;
        }
        else if (! is_numeric($value))
        {
            // throw new Exception('numberOfDecimals: ' . $value . ' is not a number!');
            return false;
        }

        return strlen($value) - strrpos($value, '.') - 1;
    }

    public static function checkAttributesValues()
    {
        foreach (Attribute::all() as $attribute)
        {
            // validateur
            $validationRules = [];
            $validationRules[$attribute->name] = $attribute->getValidationRule();
            //log::debug('validation de '.$attribute->name);
            //log::debug('règle:');
            //log::debug($validationRules);

            $values = DB::table('product_bulk_import')
                ->WhereNotNull($attribute->name)
                ->where('user_id','=',ImportHelpers::getCurrentUserIdOrnull())
                ->select($attribute->name, 'id', 'line_number')
                ->get();
            foreach ($values as $value) {
                //log::debug('ligne à valider :');
                //log::debug((array)$value);
                if (str_contains($attribute->dataType->validation_str,'numeric') and str_contains($value->{$attribute->name},','))
                {
                    self::registerError($value->id,'The numeric decimal separator should be "." instead of ","',$attribute->name,$value->{$attribute->name},'warning');
                    $value->{$attribute->name} = str_replace(',', '.', $value->{$attribute->name});
                }

                if (str_contains($attribute->dataType->validation_str,'decimal:0,2'))
                {
                    $data = $value->{$attribute->name};
                    if (self::numberOfDecimals($data) > 2)
                    {
                        self::registerError($value->id,'The decimal part should have max 2 digit',$attribute->name,$value->{$attribute->name},'warning');
                        $value->{$attribute->name}  = round($data,2);
                    }
                }

                if (str_contains($attribute->dataType->name,'inch'))
                {
                    $data = $value->{$attribute->name};
                    if (!str_contains($data,'"'))
                    {
                        self::registerError($value->id,'The inch value should contain " character',$attribute->name,$value->{$attribute->name},'warning');
                        $value->{$attribute->name}  = $data.'"';
                    }
                }


                $data = [$attribute->name => $value->{$attribute->name}];
                $validator = Validator::make($data, $validationRules)->stopOnFirstFailure(false);

                if ($validator->fails()) {
                    //log::debug($validator->messages()->get('*'));
                    $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
                    foreach ($fieldsWithErrorMessagesArray as $fieldName => $fieldWithErrorMessagesArray) {
                        foreach ($fieldWithErrorMessagesArray as $fieldWithErrorMessage) {
                            self::registerError($value->id,$fieldWithErrorMessage,$attribute->name,$value->{$attribute->name});
                            //log::debug($fieldWithErrorMessage);
                        }
                    }
                }
            }
       }
        log::debug('Individual attributes value checked');

    }

    public static function checkUnicityOfValues()
    {
        // champs qui doivent être uniques
        $unicityCecklList = ['sku','ean'];
        foreach ($unicityCecklList as $attributeName)
        {
            $nonUniqueValues = DB::table('product_bulk_import')
                ->select($attributeName)
                ->groupBy($attributeName)
                ->havingRaw('count('.$attributeName.') > 1')
                ->whereNotNull($attributeName)
                ->where('user_id','=',ImportHelpers::getCurrentUserIdOrnull())
                ->get()->pluck($attributeName);
            //log::debug($attributeName);

            foreach ($nonUniqueValues as $nonUniqueValue)
            {
                $ids = DB::table('product_bulk_import')
                    ->select('id')
                    ->where($attributeName,'=',$nonUniqueValue)
                    ->where('user_id','=',ImportHelpers::getCurrentUserIdOrnull())
                    ->get()->pluck('id');
                //log::debug($ids);
                foreach ($ids as $id)
                {
                    $message = 'The '.$attributeName.' attribute has to be unique.';
                    self::registerError($id,$message,$attributeName,$nonUniqueValue);
                }
            }
            log::debug('Unicity checked for '.$attributeName);
        }
    }

    public static function getProductsIds()
    {
        // pour chaque produit
        return DB::table('product_bulk_import')
            ->select('product_id')
            ->distinct()
            ->whereNotNull('product_id')
            ->where('user_id','=',ImportHelpers::getCurrentUserIdOrnull())
            ->orderBy('product_id')
            ->get()->pluck('product_id');
    }

    public static function getVariantsId($product_id)
    {
        // pour chaque produit
        return DB::table('product_bulk_import')
            ->select('id')
            ->where('product_id','=',$product_id)
            ->where('user_id','=',ImportHelpers::getCurrentUserIdOrnull())
            ->orderBy('wholesale-price')
            ->get()->pluck('id');
    }

    public static function checkVariantAttributes()
    {
        // variantes d'un produit toutes différentes et définissant des vraies variantes
        $var_attributes = Attribute::where('name','like','var%')
            ->select('name')
            ->get()
            ->pluck('name');
        //log::debug($var_attributes);
        $select_list = [];
        foreach($var_attributes as $var_attribute)
        {
            $select_list[] = DB::raw('sum(if(`'.$var_attribute.'` is null,0,1)) as `'.$var_attribute.'`');
        }

        // pour chaque produit
        foreach (self::getProductsIds() as $product_id)
        {
            // recherche des attributs non nuls définissant la variante
            $variant_attributes = [];
            $product_tags = DB::table('product_bulk_import')
                ->select(                    $select_list                )
                ->where('product_id','=',$product_id)
                ->where('user_id','=',ImportHelpers::getCurrentUserIdOrnull())
                ->get();
            foreach($product_tags[0] as $key => $value)
            {
                if ($product_tags[0]->{$key} > 0)
                    $variant_attributes[] = $key;
            }
            //log::debug($variant_attributes);

            if (count($variant_attributes) > 0)
            {
                // analyse des valeurs
                $select_mix_str = '';
                if (count($variant_attributes) > 1)
                {
                    foreach($variant_attributes as $variant_attribute) {
                        if (strlen($select_mix_str) > 0)
                            $select_mix_str = $select_mix_str . ',\'-\',';
                        $select_mix_str = $select_mix_str . 'ifnull(`' . $variant_attribute . '`,\'#\')';
                    }
                    $select_mix_str = 'concat('.$select_mix_str.')';
                }
                else
                {
                    $select_mix_str = 'ifnull(`' . $variant_attributes[0] . '`,\'#\')';
                }

                //log::debug($select_mix_str);

                // recherche des attributs nuls
                $products_variant_attributes_mix = DB::table('product_bulk_import')
                    ->select('id',DB::raw($select_mix_str.' as mix'))
                    ->where('product_id','=',$product_id)
                    ->where('user_id','=',ImportHelpers::getCurrentUserIdOrnull())
                    ->whereRaw($select_mix_str." like '%#%'")
                    ->get();
                //log::debug($products_variant_attributes_mix);

                if (count($products_variant_attributes_mix) > 0)
                {
                    foreach($products_variant_attributes_mix as $products_variant_attributes_mix_item) {
                        $message = 'At least one variant attribute is empty.';
                        $local_value = str_replace('#','empty',$products_variant_attributes_mix_item->mix);
                        self::registerError($products_variant_attributes_mix_item->id,
                            $message,'mix',$local_value);
                    }
                }

                // recherche des variantes non distinctes
                $products_variant_non_unique = DB::table('product_bulk_import')
                    ->select(DB::raw('count(*) as cnt'),DB::raw($select_mix_str.' as mix'))
                    ->where('product_id','=',$product_id)
                    ->where('user_id','=',ImportHelpers::getCurrentUserIdOrnull())
                    ->whereRaw($select_mix_str." not like '%#%'")
                    ->groupBy('mix')
                    ->havingRaw('count(*) > 1')
                    ->get();
                //log::debug('products_variant_non_unique');
                //log::debug($products_variant_non_unique);
                if (count($products_variant_non_unique) > 0)
                {
                    foreach($products_variant_non_unique as $products_variant_non_unique_item) {
                        $mix = str_replace('"','\"',$products_variant_non_unique_item->mix);
                        $cnt = $products_variant_non_unique_item->cnt;

                        $lines_variant_non_unique = DB::table('product_bulk_import')
                            ->select('id',DB::raw($select_mix_str.' as mix'))
                            ->where('product_id','=',$product_id)
                            ->where('user_id','=',ImportHelpers::getCurrentUserIdOrnull())
                            ->whereRaw($select_mix_str. '= "'.$mix.'"')
                            ->get();
                        //log::debug('lines_variant_non_unique');
                        //log::debug($lines_variant_non_unique);
                        foreach($lines_variant_non_unique as $lines_variant_non_unique_item) {
                            $message = 'At least two identical variants (same attributes value).';
                            self::registerError($lines_variant_non_unique_item->id,
                                $message,'mix',$lines_variant_non_unique_item->mix);
                        }
                    }
                }
            }
        }
        log::debug('Variant attribute sets checked (not null and unique)');
    }

    public static function getErrors($field = 'report')
    {
        $errors_str = '';
        $items = DB::table('product_bulk_import')
            ->select('id','line_number',DB::raw("CONCAT(ifnull(brand,''),' ',ifnull(name,''),' ',ifnull(season,'')) as full_name"),$field)
            ->orderBy('line_number','asc')
            ->where('user_id','=',ImportHelpers::getCurrentUserIdOrnull())
            ->whereNotNull($field)
            ->get();
        foreach ($items as $item)
        {
            $errors_array = explode('|',$item->{$field});
            $line_number = $item->line_number;
            foreach ($errors_array as $single_error)
            {
                $single_error_array = explode('#',$single_error);
                $errors_str.= '<p>';
                $errors_str.= 'Line #'.$line_number.' ('.$item->full_name.') - '.$single_error_array[0];
                if (strlen($single_error_array[2]) > 0)
                    $errors_str.= " - Value = <span class='text-red-500'>".$single_error_array[2]."</span>";
                $errors_str.= '</p>';
            }
        }
        return $errors_str;
    }

    public static function getReport($limit = 3)
    {
        $report_str = '';
        $cnt_products = DB::table('product_bulk_import')
            ->selectRaw(DB::raw("CONCAT(brand,' ',name,' ',ifnull(season,'')) as full_name"))
            ->where('user_id','=',ImportHelpers::getCurrentUserIdOrnull())
            ->distinct()
            ->get()->pluck('full_name');
        $cnt_variants = DB::table('product_bulk_import')
            ->where('user_id','=',ImportHelpers::getCurrentUserIdOrnull())
            ->distinct('line_number')
            ->count();

        $last_update_ts = DB::table('product_bulk_import')
            ->where('user_id','=',ImportHelpers::getCurrentUserIdOrnull())
            ->latest('updated_at')->first();
        if ($last_update_ts)
            $last_update = Carbon::parse($last_update_ts->updated_at)->setTimezone('Europe/Paris')->format('d M Y H:i:s');
        else
            $last_update='nc.';

        $report_str.= '<p class="mt-4">Dernière mise à jour : '.$last_update.'</p>';
        $report_str.= '<p class="mt-4">Number of products detected : '.count($cnt_products).'</p>';
        $report_str.= '<ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">';
        $counter = 1;
        foreach ($cnt_products as $product_name)
        {
            $report_str.='<li>'.$product_name.'</li>';
            if ($counter == $limit-1) {
                $report_str.='<li>...</li>';
                break;
            }
            $counter++;
        }

        $report_str.= '</ul>';
        $report_str.= '<p class="mt-4">Number of variants detected : '.$cnt_variants.'</p>';
        return $report_str;
    }

    public static function checkImportedData()
    {
        self::resetError();
        self::checkMandatoryAttributes();
        self::checkMandatoryCombinedAttributes();
        self::detectProductsAndSort();
        self::checkAttributesValues();
        self::checkUnicityOfValues();
        self::checkVariantAttributes();
    }




}
