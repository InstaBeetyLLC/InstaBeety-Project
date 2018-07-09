<?php

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

        \DB::table('users')->insert([
            0 =>
                [
                    'id'             => '1',
                    'name'           => 'insta beety Admin',
                    'email'          => 'admin@instabeety.com',
                    'password'       => '$2y$10$Jh1t.TwDe.L99fw191rLcuttSHhEwOHnrjZjCUVU0zOdhcmH9xNV2',
                    'remember_token' => null,
                    'created_at'     => null,
                    'updated_at'     => '2016-09-29 23:27:16',
                    'phone_number'   => '(54) 077-4460',
                    'nationality_id' => '55',
                    'active'         => '0',
                    'photo'          => '',
                    'country'        => null,
                    'city'           => null,
                    'ip'             => null,
                ],
        ]);


    }
}
