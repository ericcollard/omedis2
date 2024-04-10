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
                'id' => 143,
                'user_id' => 1,
                'product_id' => 18,
                'created_at' => '2024-04-07 17:32:39',
                'updated_at' => '2024-04-07 17:32:39',
            ),
            1 => 
            array (
                'id' => 144,
                'user_id' => 1,
                'product_id' => 18,
                'created_at' => '2024-04-07 17:32:39',
                'updated_at' => '2024-04-07 17:32:39',
            ),
            2 => 
            array (
                'id' => 145,
                'user_id' => 1,
                'product_id' => 18,
                'created_at' => '2024-04-07 17:32:39',
                'updated_at' => '2024-04-07 17:32:39',
            ),
            3 => 
            array (
                'id' => 146,
                'user_id' => 1,
                'product_id' => 18,
                'created_at' => '2024-04-07 17:32:39',
                'updated_at' => '2024-04-07 17:32:39',
            ),
        ));
        
        
    }
}