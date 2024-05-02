<?php

namespace App\Imports;

use App\Models\Attribute;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\ImportFailed;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

HeadingRowFormatter::default('none');

class ProductsImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        ImportHelpers::truncate_table();

        $errors = '';

        log::debug('Inserting bulk data');

        foreach ($rows as $key => $row)
        {
            //log::debug($row);
            if ($key == 0)
            {
                // check validity of attributes names
                log::debug('Inserting bulk data - Check validity of attributes names in the input file');
                foreach ($row as $attribute_name => $value)
                {
                    log::debug('Inserting bulk data - checking '.$attribute_name);
                    if (is_int($attribute_name))
                    {
                        $errors.= '<p>The #'.$attribute_name. 'th column of the file has no column name ! This has to be an existing attribute name.</p>';
                    }
                    $attribute = Attribute::where('name','=',$attribute_name)->first();
                    if (!$attribute)
                    {
                        $errors.=  '<p>The '.$attribute_name.' attribute does not exist. Please check authorized attributes name.</p>';
                    }
                }
                if (strlen($errors) > 0)
                    abort(500,$errors);
            }

            log::debug('Inserting bulk data - Preparing insertion');
            $data = [];
            $data['user_id'] = ImportHelpers::getCurrentUserIdOrnull();
            $data['line_number'] = $key+1;
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();
            foreach ($row as $attribute_name => $value) {
                if (strlen((string)$value) == 0)
                    $data[$attribute_name] = null;
                else
                    $data[$attribute_name] = (string)$value;
                //log::debug($attribute_name.' < '.$value);
            }
            log::debug('Inserting bulk data - Insertion in DB');
            //log::debug($data);
            DB::table('product_bulk_import')->insert($data);

        }

    }

    /*
    public function registerEvents(): array
    {
        return [
            ImportFailed::class => function($event) {
                //dispatch(new NotifyAdminOfFailedImport($this->user, $event->getException()->getMessage());
                log::debug('Inserting bulk data - ImportFailed');
                abort(500,);
            },
        ];
    }
    */

}
