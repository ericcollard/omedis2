<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HistoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('histories')->delete();
        
        \DB::table('histories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'model' => 'AttributeListValue',
                'action' => 'CREATE',
                'user_id' => '1',
                'old_values' => 'none',
                'new_values' => 'name: \'la-chaussette-de-france\',comment: \'\',attribute_list_id: \'3\',odoo_name: \'LA CHAUSSETTE DE FRANCE\',sort: \'\'',
                'created_at' => '2024-04-07 14:42:02',
                'updated_at' => '2024-04-07 14:42:02',
            ),
            1 => 
            array (
                'id' => 2,
                'model' => 'AttributeListValue',
                'action' => 'CREATE',
                'user_id' => '1',
                'old_values' => 'none',
                'new_values' => 'name: \'ts\',comment: \'\',attribute_list_id: \'9\',odoo_name: \'\',sort: \'\'',
                'created_at' => '2024-04-07 14:42:17',
                'updated_at' => '2024-04-07 14:42:17',
            ),
            2 => 
            array (
                'id' => 3,
                'model' => 'AttributeListValue',
                'action' => 'UPDATE',
                'user_id' => '1',
                'old_values' => 'name: \'ts\',comment: \'\',attribute_list_id: \'9\',odoo_name: \'\',sort: \'0\'',
                'new_values' => 'name: \'tismail\',comment: \'\',attribute_list_id: \'9\',odoo_name: \'Tismail\',sort: \'0\'',
                'created_at' => '2024-04-07 14:43:26',
                'updated_at' => '2024-04-07 14:43:26',
            ),
            3 => 
            array (
                'id' => 4,
                'model' => 'AttributeListValue',
                'action' => 'CREATE',
                'user_id' => '1',
                'old_values' => 'none',
                'new_values' => 'name: \'windsurfer\',comment: \'\',attribute_list_id: \'3\',odoo_name: \'WINDSURFER\',sort: \'\'',
                'created_at' => '2024-04-10 12:18:23',
                'updated_at' => '2024-04-10 12:18:23',
            ),
            4 => 
            array (
                'id' => 5,
                'model' => 'AttributeListValue',
                'action' => 'CREATE',
                'user_id' => '1',
                'old_values' => 'none',
                'new_values' => 'name: \'watersports-windsurf-windsurfer\',comment: \'\',attribute_list_id: \'2\',odoo_name: \'Tous / Windsurf / Windsurfer\',sort: \'\'',
                'created_at' => '2024-04-10 12:19:02',
                'updated_at' => '2024-04-10 12:19:02',
            ),
        ));
        
        
    }
}