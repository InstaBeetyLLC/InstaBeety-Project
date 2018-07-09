<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('roles')->delete();

        \DB::table('roles')->insert([
            0 =>
                [
                    'id'           => '1',
                    'name'         => 'admin',
                    'display_name' => 'website admin',
                    'description'  => 'can do every thing ',
                    'created_at'   => null,
                    'updated_at'   => null,
                ],
            1 =>
                [
                    'id'           => '2',
                    'name'         => 'vendor',
                    'display_name' => 'vendor',
                    'description'  => 'can assign  stores',
                    'created_at'   => null,
                    'updated_at'   => null,
                ],
            2 =>
                [
                    'id'           => '3',
                    'name'         => 'user',
                    'display_name' => 'normal user',
                    'description'  => 'can only access one store ',
                    'created_at'   => null,
                    'updated_at'   => null,
                ],
        ]);


    }
}
