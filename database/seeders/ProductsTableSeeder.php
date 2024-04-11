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
                'id' => 41,
                'user_id' => '1',
                'name' => 'Accessory Bag',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            1 => 
            array (
                'id' => 42,
                'user_id' => '1',
                'name' => 'Base 0cm',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            2 => 
            array (
                'id' => 43,
                'user_id' => '1',
                'name' => 'Board',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            3 => 
            array (
                'id' => 44,
                'user_id' => '1',
                'name' => 'Boardbag',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            4 => 
            array (
                'id' => 45,
                'user_id' => '1',
                'name' => 'Boom',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            5 => 
            array (
                'id' => 46,
                'user_id' => '1',
                'name' => 'Full package',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            6 => 
            array (
                'id' => 47,
                'user_id' => '1',
                'name' => 'G10 Fin',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            7 => 
            array (
                'id' => 48,
                'user_id' => '1',
            'name' => 'Gasket Lips (Set of 2)',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            8 => 
            array (
                'id' => 49,
                'user_id' => '1',
                'name' => 'Locking Plate 1PC',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            9 => 
            array (
                'id' => 50,
                'user_id' => '1',
                'name' => 'Mast',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            10 => 
            array (
                'id' => 51,
                'user_id' => '1',
                'name' => 'MFC Plastic Red Fin',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            11 => 
            array (
                'id' => 52,
                'user_id' => '1',
                'name' => 'MFC Plastic White Fin',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            12 => 
            array (
                'id' => 53,
                'user_id' => '1',
                'name' => 'Package w/o sail',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            13 => 
            array (
                'id' => 54,
                'user_id' => '1',
                'name' => 'Quick Lock Screw',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            14 => 
            array (
                'id' => 55,
                'user_id' => '1',
                'name' => 'Race Daggerboard 85cm',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            15 => 
            array (
                'id' => 56,
                'user_id' => '1',
                'name' => 'Sail',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            16 => 
            array (
                'id' => 57,
                'user_id' => '1',
                'name' => 'Soft White Daggerboard Cover',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            17 => 
            array (
                'id' => 58,
                'user_id' => '1',
            'name' => 'Tendon Joint (U-Pin)',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
            18 => 
            array (
                'id' => 59,
                'user_id' => '1',
                'name' => 'Uphaul',
                'season' => NULL,
                'brand' => 'windsurfer',
                'category' => 'watersports-windsurf-windsurfer',
                'sort' => 0,
                'created_at' => '2024-04-10 13:57:12',
                'updated_at' => '2024-04-10 13:57:12',
            ),
        ));
        
        
    }
}