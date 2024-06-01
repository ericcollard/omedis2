<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VariantsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('variants')->delete();
        
        \DB::table('variants')->insert(array (
            0 => 
            array (
                'id' => 2101,
                'user_id' => 1,
                'product_id' => 794,
                'created_at' => '2024-06-01 10:21:56',
                'updated_at' => '2024-06-01 10:21:56',
            ),
            1 => 
            array (
                'id' => 2102,
                'user_id' => 1,
                'product_id' => 794,
                'created_at' => '2024-06-01 10:21:56',
                'updated_at' => '2024-06-01 10:21:56',
            ),
            2 => 
            array (
                'id' => 2103,
                'user_id' => 1,
                'product_id' => 794,
                'created_at' => '2024-06-01 10:21:56',
                'updated_at' => '2024-06-01 10:21:56',
            ),
            3 => 
            array (
                'id' => 2104,
                'user_id' => 1,
                'product_id' => 794,
                'created_at' => '2024-06-01 10:21:56',
                'updated_at' => '2024-06-01 10:21:56',
            ),
            4 => 
            array (
                'id' => 2105,
                'user_id' => 1,
                'product_id' => 794,
                'created_at' => '2024-06-01 10:21:56',
                'updated_at' => '2024-06-01 10:21:56',
            ),
            5 => 
            array (
                'id' => 2106,
                'user_id' => 1,
                'product_id' => 794,
                'created_at' => '2024-06-01 10:21:56',
                'updated_at' => '2024-06-01 10:21:56',
            ),
            6 => 
            array (
                'id' => 2107,
                'user_id' => 1,
                'product_id' => 794,
                'created_at' => '2024-06-01 10:21:56',
                'updated_at' => '2024-06-01 10:21:56',
            ),
            7 => 
            array (
                'id' => 2108,
                'user_id' => 1,
                'product_id' => 794,
                'created_at' => '2024-06-01 10:21:56',
                'updated_at' => '2024-06-01 10:21:56',
            ),
        ));
        
        
    }
}