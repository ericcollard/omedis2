<?php

namespace App\Imports;

use App\Models\Attribute;
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
        DB::table('product_bulk_import')->where('user_id', '=', self::getCurrentUserIdOrAbort())->delete();
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
            $table->integer('user_id')->default(1);
            $table->integer('product_id')->nullable();
            $table->integer('line_number')->nullable();
            $table->integer('order')->nullable();
            $table->string('report')->nullable();
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

    public static function registerError($lineID,$message)
    {
        $existing_text = DB::table('product_bulk_import')
            ->where('id', $lineID)->select('report')->first();

        if ($existing_text->report)
            $final_text =$existing_text->report.'|';
        else
            $final_text = '';

        $final_text = $final_text.$message;

        $affected = DB::table('product_bulk_import')
            ->where('id','=' ,$lineID)
            ->update(['report' => $final_text]);//DB::raw( "concat(ifnull(errors,''),'".$message."')")
    }

    public static function checkMandatoryAttributes()
    {
        // vérification attributs obligatoires
        $mandatory_attributes_array = Attribute::select('name')->where('required','=',1)->get()->pluck('name')->toArray();

        foreach ($mandatory_attributes_array as $attribute)
        {
            $invalids = DB::table('product_bulk_import')
                ->where($attribute,'=','')
                ->orWhereNull($attribute)
                ->get();
            foreach ($invalids as $invalid)
            {
                $lineId = ((array)$invalid)['id'];
                $error_report = 'Required attribute '.$attribute.' not filled';
                ImportHelpers::registerError($lineId,$error_report);
            }

        }
        log::debug('Mandatory attributes checked');
    }

    public static function detectProductsAndSort()
    {
        //select concat(brand,name,ifnull(season,'')) as ftt, `wholesale-price`,id from product_bulk_import order by ftt,`wholesale-price`,id
        $items = DB::table('product_bulk_import')
            ->select("id","wholesale-price",DB::raw("CONCAT(brand,name,ifnull(season,'')) as full_name"))
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

    public static function checkValues()
    {
        $errors = '';

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
                ->select($attribute->name, 'id', 'line_number')
                ->get();
            foreach ($values as $value) {
                //log::debug('ligne à valider :');
                //log::debug((array)$value);
                $data = [$attribute->name => $value->{$attribute->name}];
                $validator = Validator::make($data, $validationRules)->stopOnFirstFailure(false);

                if ($validator->fails()) {
                    //log::debug($validator->messages()->get('*'));
                    $fieldsWithErrorMessagesArray = $validator->messages()->get('*');
                    foreach ($fieldsWithErrorMessagesArray as $fieldName => $fieldWithErrorMessagesArray) {
                        foreach ($fieldWithErrorMessagesArray as $fieldWithErrorMessage) {
                            self::registerError($value->id,$fieldWithErrorMessage);
                            //log::debug($fieldWithErrorMessage);
                        }
                    }
                }
            }
       }

        return $errors;
    }

    public static function checkImportedData()
    {
        //self::registerError(2,'test');

        //return '';
        self::resetError();
        self::checkMandatoryAttributes();
        self::detectProductsAndSort();
        self::checkValues();
        $errors= "";
        return $errors;
    }

    public static function normalizeSeparator2SemiColumn($value)
    {
        return str_replace(',',';',$value);
    }


}
