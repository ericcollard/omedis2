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
                'id' => 2215,
                'user_id' => 1,
                'product_id' => 818,
                'created_at' => '2024-07-23 16:09:05',
                'updated_at' => '2024-07-23 16:09:05',
            ),
            1 => 
            array (
                'id' => 2216,
                'user_id' => 1,
                'product_id' => 818,
                'created_at' => '2024-07-23 16:09:05',
                'updated_at' => '2024-07-23 16:09:05',
            ),
        ));
        
        
    }
}