<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OdooProductValuesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('odoo_product_values')->delete();
        
        \DB::table('odoo_product_values')->insert(array (
            0 => 
            array (
                'id' => 479,
                'product_id' => 794,
                'odoo_model_id' => 1,
                'value' => 'Tous / Wingfoil / Flotteur',
                'created_at' => '2024-06-01 10:21:58',
                'updated_at' => '2024-06-01 10:21:58',
            ),
            1 => 
            array (
                'id' => 480,
                'product_id' => 794,
                'odoo_model_id' => 4,
                'value' => 'Fone ROCKET WING 2023',
                'created_at' => '2024-06-01 10:21:58',
                'updated_at' => '2024-06-01 10:21:58',
            ),
            2 => 
            array (
                'id' => 481,
                'product_id' => 794,
                'odoo_model_id' => 7,
                'value' => 'FONE',
                'created_at' => '2024-06-01 10:21:58',
                'updated_at' => '2024-06-01 10:21:58',
            ),
            3 => 
            array (
                'id' => 482,
                'product_id' => 794,
                'odoo_model_id' => 9,
                'value' => '1082.50',
                'created_at' => '2024-06-01 10:21:58',
                'updated_at' => '2024-06-01 10:21:58',
            ),
            4 => 
            array (
                'id' => 483,
                'product_id' => 794,
                'odoo_model_id' => 10,
                'value' => '649.50',
                'created_at' => '2024-06-01 10:21:58',
                'updated_at' => '2024-06-01 10:21:58',
            ),
            5 => 
            array (
                'id' => 484,
                'product_id' => 794,
                'odoo_model_id' => 13,
                'value' => 'Acheter',
                'created_at' => '2024-06-01 10:21:58',
                'updated_at' => '2024-06-01 10:21:58',
            ),
            6 => 
            array (
                'id' => 485,
                'product_id' => 794,
                'odoo_model_id' => 14,
                'value' => 'ARTICLE STOCKABLE',
                'created_at' => '2024-06-01 10:21:58',
                'updated_at' => '2024-06-01 10:21:58',
            ),
            7 => 
            array (
                'id' => 486,
                'product_id' => 794,
                'odoo_model_id' => 15,
                'value' => 'TVA 20%',
                'created_at' => '2024-06-01 10:21:58',
                'updated_at' => '2024-06-01 10:21:58',
            ),
        ));
        
        
    }
}