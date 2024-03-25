<?php

namespace App\Imports;

use App\Models\Attribute;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;



class ImportHelpers
{
    public static function initialize_table()
    {
        log::debug('Check if product_bulk_import table exists');
        if (!Schema::hasTable('product_bulk_import')) {
            Schema::create('product_bulk_import', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->integer('user_id')->default(1);
                $table->integer('product_id')->nullable();
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

        log::debug('Empty product_bulk_import table or the current user');

        DB::table('product_bulk_import')->where('user_id', '=', self::getCurrentUserIdOrAbort())->delete();


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

}
