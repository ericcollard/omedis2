<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatafilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('datafiles')->delete();
        
        \DB::table('datafiles')->insert(array (
            0 => 
            array (
                'id' => 3,
                'user_id' => '1',
                'name' => 'AFS Wing 2024',
                'supplier' => 'afs',
                'filepath' => 'omedis-afs-05-09-2024-1725556424.xlsx',
                'created_at' => '2024-09-05 17:13:44',
                'updated_at' => '2024-09-05 17:13:55',
            ),
            1 => 
            array (
                'id' => 4,
                'user_id' => '1',
                'name' => 'Gants Winter 2024-25',
                'supplier' => 'black-diamond',
                'filepath' => 'omedis-black-diamond-05-09-2024-1725556476.xlsx',
                'created_at' => '2024-09-05 17:14:36',
                'updated_at' => '2024-09-05 17:15:08',
            ),
            2 => 
            array (
                'id' => 5,
                'user_id' => '1',
                'name' => 'Waterski 2024',
                'supplier' => 'radar',
                'filepath' => 'omedis-radar-05-09-2024-1725556536.xlsx',
                'created_at' => '2024-09-05 17:15:36',
                'updated_at' => '2024-09-05 17:16:49',
            ),
            3 => 
            array (
                'id' => 6,
                'user_id' => '1',
                'name' => 'WING et KITE 2025',
                'supplier' => 'duotone',
                'filepath' => 'omedis-duotone-05-09-2024-1725556563.xlsx',
                'created_at' => '2024-09-05 17:16:03',
                'updated_at' => '2024-09-05 17:16:33',
            ),
            4 => 
            array (
                'id' => 7,
                'user_id' => '1',
                'name' => 'Snow et Racing W24-25',
                'supplier' => 'poc',
                'filepath' => 'omedis-poc-05-09-2024-1725556630.xlsx',
                'created_at' => '2024-09-05 17:17:10',
                'updated_at' => '2024-09-05 17:17:43',
            ),
            5 => 
            array (
                'id' => 8,
                'user_id' => '1',
                'name' => 'Winter 24-25 gloves and poles',
                'supplier' => 'leki',
                'filepath' => 'omedis-leki-05-09-2024-1725556683.xlsx',
                'created_at' => '2024-09-05 17:18:03',
                'updated_at' => '2024-09-05 17:19:19',
            ),
            6 => 
            array (
                'id' => 9,
                'user_id' => '1',
                'name' => 'Selection Fall24',
                'supplier' => 'prolimit',
                'filepath' => 'omedis-prolimit-05-09-2024-1725556720.xlsx',
                'created_at' => '2024-09-05 17:18:40',
                'updated_at' => '2024-09-05 17:19:33',
            ),
            7 => 
            array (
                'id' => 10,
                'user_id' => '1',
                'name' => 'Selection FW2425',
                'supplier' => 'rip-curl',
                'filepath' => 'omedis-rip-curl-05-09-2024-1725556796.xlsx',
                'created_at' => '2024-09-05 17:19:56',
                'updated_at' => '2024-09-05 17:21:32',
            ),
            8 => 
            array (
                'id' => 11,
                'user_id' => '1',
                'name' => 'Racing W24-25',
                'supplier' => 'rossignol',
                'filepath' => 'omedis-rossignol-05-09-2024-1725556849.xlsx',
                'created_at' => '2024-09-05 17:20:49',
                'updated_at' => '2024-09-05 17:21:46',
            ),
            9 => 
            array (
                'id' => 12,
                'user_id' => '1',
                'name' => 'GrandPublic W24-25',
                'supplier' => 'rossignol',
                'filepath' => 'omedis-rossignol-05-09-2024-1725556877.xlsx',
                'created_at' => '2024-09-05 17:21:17',
                'updated_at' => '2024-09-05 17:21:57',
            ),
        ));
        
        
    }
}