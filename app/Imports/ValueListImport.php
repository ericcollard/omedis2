<?php

namespace App\Imports;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ValueListImport implements ToCollection, WithHeadingRow
{
    private $table_name;
    private $default_value;

    public function __construct(string $table_name, string $default_value = '')
    {
        $this->table_name = $table_name;
        if (strlen($default_value)>0)
            $this->default_value = $default_value;
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        $errors = '';
        log::debug('Inserting list data into '.$this->table_name);
        log::debug('Default value '.$this->default_value);
        if (!Schema::hasTable($this->table_name))
            abort(500,'Table '.$this->table_name.' doesnt exists.');

        foreach ($rows as $key => $row)
        {
            if ($key == 0)
            {
                // check validity of attributes names
                log::debug('Inserting list data - Check validity of column names');
                //log::debug($row);
                foreach ($row as $column_name => $value)
                {
                    log::debug('Inserting list data - checking column name'.$column_name);
                    if (!Schema::hasColumn($this->table_name, $column_name))
                    {
                        $errors.= '<p>The column named '.$column_name.' dosent exists in the '.$this->table_name.' table</p>';
                    }
                }
                if (strlen($errors) > 0)
                    abort(500,$errors);
            }


            log::debug('Inserting list data - Preparing insertion');
            $data = [];
            $data['user_id'] = ImportHelpers::getCurrentUserIdOrAbort();
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();

            if ($this->default_value)
            {
                $default = explode('=',$this->default_value);
                $field = $default[0];
                $value = $default[1];
                $data[$field] = $value;
            }

            foreach ($row as $column_name => $value) {
                $data[$column_name] = $value;
            }

            log::debug('Inserting list data - Insertion in DB');
            //log::debug($data);
            DB::table($this->table_name)->insert($data);


        }


    }
}
