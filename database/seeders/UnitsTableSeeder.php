<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('units')->delete();
        
        \DB::table('units')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'none',
                'comment' => 'No unit, for string as an exemple',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'm',
            'comment' => 'Meters (SI)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => NULL,
                'updated_at' => '2023-09-23 15:54:30',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'cm',
                'comment' => 'Centimeter',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => NULL,
                'updated_at' => '2023-09-23 15:54:40',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'mm',
                'comment' => 'Milimeter',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => NULL,
                'updated_at' => '2023-09-23 15:54:52',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'kg',
            'comment' => 'Kilogram (SI)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => NULL,
                'updated_at' => '2023-09-23 15:55:10',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'g',
            'comment' => 'Gram (1/1000 kg)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2023-09-23 15:55:29',
                'updated_at' => '2023-09-23 15:55:29',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'm2',
            'comment' => 'Square meter surface (SI)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2023-09-23 15:56:05',
                'updated_at' => '2023-09-23 15:56:59',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'm3',
            'comment' => 'Cubic meter volume (SI)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2023-09-23 15:56:23',
                'updated_at' => '2023-09-23 15:57:07',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'l',
            'comment' => 'Liter (volume)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2023-09-23 15:56:43',
                'updated_at' => '2023-09-23 15:56:43',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 's',
            'comment' => 'Second (duration)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2023-09-23 15:57:39',
                'updated_at' => '2023-09-23 15:57:39',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'inch',
            'comment' => 'Inch (Pouce) : imperial length unit (=2,54cm)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2023-09-23 16:00:19',
                'updated_at' => '2023-09-23 16:00:19',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'ft',
            'comment' => 'Foot (pied) : impérial length unit (=30,48cm)
You must use the symbol “prime” which is a single quotation mark “ ‘ “ after feet part ... even when there is no inches part.
Sample : 5\'6 , 5\'4, 5\'2, ... 5\', 4\'9',
                'user_id' => 2,
                'sort' => 0,
                'created_at' => '2023-09-23 16:01:13',
                'updated_at' => '2023-10-02 18:48:40',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'yd',
            'comment' => 'Yard : imperial length unit (=91,44cm)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2023-09-23 16:01:45',
                'updated_at' => '2023-09-23 16:01:45',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'mile',
            'comment' => 'Mile : imperial length unit (=1,609344km)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2023-09-23 16:02:33',
                'updated_at' => '2023-09-23 16:02:33',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'deg',
            'comment' => 'Degree (angle unit)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2023-09-23 16:03:44',
                'updated_at' => '2023-09-23 16:03:44',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'eur',
            'comment' => 'Europeen currency (money)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2023-09-23 16:04:22',
                'updated_at' => '2023-09-23 16:04:22',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'usd',
            'comment' => 'US dollars currency (money)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2023-09-23 16:04:34',
                'updated_at' => '2023-09-23 16:04:34',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'gbp',
            'comment' => 'Great Britain pound (Livre sterling) : currency',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2023-09-23 16:05:51',
                'updated_at' => '2023-09-23 16:05:51',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'chf',
            'comment' => 'Suiss currency unit (money)',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2023-09-23 16:06:12',
                'updated_at' => '2023-09-23 16:06:12',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'cm2',
                'comment' => 'Square centimeter surface',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2023-09-23 16:06:12',
                'updated_at' => '2023-09-23 16:06:12',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'mm2',
                'comment' => 'Square milimeter surface',
                'user_id' => 1,
                'sort' => 0,
                'created_at' => '2023-09-23 16:06:12',
                'updated_at' => '2023-09-23 16:06:12',
            ),
        ));
        
        
    }
}