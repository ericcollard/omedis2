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
                'id' => 818,
                'user_id' => '1',
                'name' => 'WINDFOIL BAG 8MM 85 BLACKLINE',
                'season' => NULL,
                'brand' => 'patlove',
                'category' => 'watersports-windfoil-bag',
                'sort' => 0,
                'selected' => 1,
                'created_at' => '2024-07-23 16:09:05',
                'updated_at' => '2024-07-23 16:09:05',
            ),
        ));
        
        
    }
}