<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Administrateur général',
                'email' => 'eric.collard@free.fr',
                'email_verified_at' => '2022-06-01 02:00:00',
                'password' => '$2y$10$Qy.UROfMdVwkZKQlopVjWOapcHwDxLeLIG.4z7E.AJ7C0x2nv7b8e',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'roles' => '["ROLE_ADMIN"]',
                'phone' => NULL,
                'last_login' => NULL,
                'comment' => NULL,
                'created_at' => '2022-06-01 02:00:00',
                'updated_at' => '2022-07-21 16:35:50',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Eric COLLARD',
                'email' => 'eric@glissattitude.com',
                'email_verified_at' => '2022-06-01 02:00:00',
                'password' => '$2y$10$Qy.UROfMdVwkZKQlopVjWOapcHwDxLeLIG.4z7E.AJ7C0x2nv7b8e',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'c3Fz51IlkUYyJ9mHaOjoh5anHpHqVSNG9lsvfbcmiD2J6cpVFC1M0DX1i6GC',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'roles' => '["ROLE_CONTRIBUTOR"]',
                'phone' => NULL,
                'last_login' => NULL,
                'comment' => NULL,
                'created_at' => '2022-06-01 02:00:00',
                'updated_at' => '2022-07-21 16:35:50',
            ),
        ));
        
        
    }
}