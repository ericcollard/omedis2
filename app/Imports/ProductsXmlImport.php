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
use XMLReader;


class ProductsXmlImport
{
    public static function process($filePath,$disk)
    {
        // lecture de la structure products/product/variant/attribute
        ImportHelpers::truncate_table();

        // attributes authorized
        $attributes_array = Attribute::select('name')->get()->pluck('name')->toArray();
        log::debug($attributes_array);

        $batchData = [];

        $reader = new XMLReader();
        $inputfilepath = Storage::disk($disk)->path($filePath);
        $reader->open($inputfilepath);
        $product_counter = 0;
        $variant_counter = 0;
        $current_user_id = ImportHelpers::getCurrentUserIdOrnull();
        while ($reader->read()) {
            if ($reader->nodeType == XMLReader::ELEMENT && $reader->name === 'product') {
                //log::debug('inner product element');
                $innerXML = $reader->readOuterXml();
                $innerReader = new XMLReader();
                $innerReader->xml($innerXML);
                $product_counter++;


                while ($innerReader->read()) {
                    if ($innerReader->nodeType == XMLReader::ELEMENT && $innerReader->name === 'variant') {
                        //log::debug('inner variant element');

                        $inner2XML = $innerReader->readOuterXml();
                        $inner2Reader = new XMLReader();
                        $inner2Reader->xml($inner2XML);
                        $productData = [];
                        $variant_counter++;
                        $productData['product_id'] = $product_counter;
                        $productData['user_id'] = $current_user_id;
                        $productData['line_number'] = $variant_counter;
                        $productData['created_at'] = Carbon::now();
                        $productData['updated_at'] = Carbon::now();
                        while ($inner2Reader->read()) {
                            if ($inner2Reader->nodeType == XMLReader::ELEMENT && $inner2Reader->name != 'variant') {
                                //log::debug($inner2Reader->name);
                                if (in_array($inner2Reader->name,$attributes_array)) {
                                    $inner2NodeName = $inner2Reader->name;
                                    $inner2NodeValue = $inner2Reader->readString();
                                    $productData[$inner2NodeName] = $inner2NodeValue;
                                }
                                else
                                {
                                    abort(500, "Error in the input file ! The ".$inner2Reader->name. " does not exist. This has to be an existing attribute name.");
                                }

                            }}
                        $batchData[] = $productData;
                        $inner2Reader->close();

                    }
                }

                DB::table('product_bulk_import')->insert($batchData);
                $batchData = [];

                $innerReader->close();
            }
        }

        if ($product_counter == 0)
        {
            abort(500, "Error in the input file ! No 'product' tag detected.");
        }
        if ($variant_counter == 0)
        {
            abort(500, "Error in the input file ! No 'variant' tag detected.");
        }
        $reader->close();

    }

}
