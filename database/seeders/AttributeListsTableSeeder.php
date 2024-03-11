<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AttributeListsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('attribute_lists')->delete();
        
        \DB::table('attribute_lists')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'color',
                'comment' => 'Color name',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'category',
                'comment' => 'Commercial category name',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => NULL,
                'updated_at' => '2023-09-23 15:49:33',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'brand',
                'comment' => NULL,
                'user_id' => 1,
                'sort' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'size-int',
                'comment' => 'Clothing size system based on S/M/L',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'size-eu',
            'comment' => 'Clothing size system based on EU system (36/38/40/42)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'size-uk',
            'comment' => 'Clothing size system based on UK system (2/4/6/8)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'size-us',
            'comment' => 'Clothing size system based on US system (2/4/6/8)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'uom-options',
                'comment' => 'options for quantity measurement',
                'user_id' => 2,
                'sort' => 0,
                'created_at' => '2023-10-04 12:25:31',
                'updated_at' => '2023-10-04 12:27:15',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'supplier',
                'comment' => 'Supplier company or distributor',
                'user_id' => 2,
                'sort' => 0,
                'created_at' => '2023-10-12 21:11:15',
                'updated_at' => '2023-10-12 21:11:53',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'size-dbl',
                'comment' => 'Taille double',
                'user_id' => 2,
                'sort' => 0,
                'created_at' => '2024-01-04 13:52:46',
                'updated_at' => '2024-01-04 13:52:46',
            ),
        ));
        
        
    }
}