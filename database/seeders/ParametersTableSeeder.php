<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParametersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('parameters')->delete();

        \DB::table('parameters')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'version',
                'value' => '2.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));


    }
}
