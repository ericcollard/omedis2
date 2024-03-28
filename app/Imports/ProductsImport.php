<?php

namespace App\Imports;

use App\Models\Attribute;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class ProductsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        ImportHelpers::truncate_table();

        log::debug('Inserting data');

        foreach ($rows as $key => $row)
        {
            if ($key == 0)
            {
                // check validity of attributes names
                log::debug('Check validity of attributes names in the input file');
                foreach ($row as $attribute_name => $value)
                {
                    if (is_int($attribute_name))
                    {
                        abort(500, "Error in the input file ! The #".$attribute_name. "th column of the file has no column name ! This has to be an existing attribute name.");
                    }
                    $attribute = Attribute::where('name','=',$attribute_name)->first();
                    if (!$attribute)
                    {
                        abort(500, "Error in the input file ! The ".$attribute_name. " does not exist. This has to be an existing attribute name.");
                    }
                }
            }

            $data = [];
            $data['user_id'] = ImportHelpers::getCurrentUserIdOrAbort();
            $data['line_number'] = $key+1;
            foreach ($row as $attribute_name => $value) {
                $data[$attribute_name] = $value;
            }
            DB::table('product_bulk_import')->insert($data);

        }

    }
}
