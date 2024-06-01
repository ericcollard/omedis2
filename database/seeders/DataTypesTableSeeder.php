<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DataTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('data_types')->delete();
        
        \DB::table('data_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'selection',
                'comment' => 'Value choosen in a closed list of string values',
                'validation_str' => 'string|max:255',
                'user_id' => 1,
                'sort' => 2,
                'created_at' => NULL,
                'updated_at' => '2024-03-14 10:05:08',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'string',
                'comment' => 'Text field without 256 char limit. Utf-8 encoded characters.',
                'validation_str' => 'string|max:255',
                'user_id' => 1,
                'sort' => 1,
                'created_at' => NULL,
                'updated_at' => '2024-03-14 10:05:08',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'boolean',
            'comment' => 'Values : 0 (false) or 1 (true). Encoded as integer numeric value',
                'validation_str' => 'numeric|integer|min:0|max:1',
                'user_id' => 1,
                'sort' => 3,
                'created_at' => NULL,
                'updated_at' => '2024-03-14 10:05:08',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'integer',
                'comment' => 'Positive numeric value without decimal part. Max : 2147483647',
                'validation_str' => 'numeric|integer|gt:0|max:2147483646',
                'user_id' => 1,
                'sort' => 4,
                'created_at' => NULL,
                'updated_at' => '2024-03-14 10:05:08',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'float',
                'comment' => 'Numeric value with maximum 4 digits decimal part. Decimal separator: ".", no thousand separator. Ex. "123456.45"',
                'validation_str' => 'numeric|decimal:0,4|gt:0',
                'user_id' => 1,
                'sort' => 5,
                'created_at' => NULL,
                'updated_at' => '2024-03-14 10:05:08',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'money',
                'comment' => 'Numeric value with maximum 2 digits decimal part. Decimal separator: ".", no thousand separator.Ex. "123.45"',
                'validation_str' => 'numeric|decimal:0,2|gt:0',
                'user_id' => 1,
                'sort' => 6,
                'created_at' => NULL,
                'updated_at' => '2024-03-14 10:05:08',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'text',
                'comment' => 'Text field without length limit. Utf-8 encoded characters',
                'validation_str' => 'string',
                'user_id' => 1,
                'sort' => 7,
                'created_at' => NULL,
                'updated_at' => '2024-03-14 10:05:08',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'url',
            'comment' => 'Text field without length limit. Utf-8 encoded characters. Can contain more than one url, separated by | (pipe)',
                'validation_str' => 'string|urllist',
                'user_id' => 1,
                'sort' => 8,
                'created_at' => '2024-01-04 12:06:06',
                'updated_at' => '2024-03-27 18:13:26',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'year',
                'comment' => 'Number representing a year',
                'validation_str' => 'numeric|integer|min:1950|max:2050',
                'user_id' => 1,
                'sort' => 9,
                'created_at' => '2024-02-14 10:39:03',
                'updated_at' => '2024-03-14 10:05:08',
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'percent',
                'comment' => 'percantage rate',
                'validation_str' => 'numeric|decimal:0,4|gte:0|lte:1',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2024-03-27 22:45:50',
                'updated_at' => '2024-03-27 22:47:37',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'feet',
            'comment' => 'The notation has to be with like N\'M where N is representing feets, and M subdivision (inches). M has to be between 0 and 11',
            'validation_str' => 'regex:/^\\d+\'(([0-9]\\|1[01])?)$/',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2024-03-27 22:58:31',
                'updated_at' => '2024-04-20 16:45:06',
            ),
            11 => 
            array (
                'id' => 13,
                'name' => 'inch',
                'comment' => 'The notation has to be with like N"M where N is representing inches, and M subdivision. M has to be between 0 and 11',
            'validation_str' => 'regex:/^\\d+"(([0-9]\\|1[01])?)$/',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2024-03-28 00:22:55',
                'updated_at' => '2024-04-20 16:45:38',
            ),
            12 => 
            array (
                'id' => 14,
                'name' => 'double',
                'comment' => NULL,
            'validation_str' => 'regex:/(^.+-.+$)/',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2024-03-28 00:29:55',
                'updated_at' => '2024-03-28 00:29:55',
            ),
        ));
        
        
    }
}