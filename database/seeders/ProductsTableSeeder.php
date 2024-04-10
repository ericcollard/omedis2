<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 18,
                'user_id' => '1',
                'created_at' => '2024-04-07 17:32:39',
                'updated_at' => '2024-04-07 17:32:39',
            ),
        ));
        
        
    }
}