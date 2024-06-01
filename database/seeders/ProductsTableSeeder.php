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
                'id' => 794,
                'user_id' => '1',
                'name' => 'ROCKET WING',
                'season' => '2023',
                'brand' => 'fone',
                'category' => 'watersports-wingfoil-board',
                'sort' => 0,
                'selected' => 1,
                'created_at' => '2024-06-01 10:21:56',
                'updated_at' => '2024-06-01 10:21:56',
            ),
        ));
        
        
    }
}