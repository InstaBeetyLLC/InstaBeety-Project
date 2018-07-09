<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => '6',
                'name' => 'Jeddah',
                'region_id' => '1',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => '7',
                'name' => 'Khamis Mushayt',
                'region_id' => '2',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => '8',
                'name' => 'Riyadh',
                'region_id' => '3',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => '9',
                'name' => 'Khobar',
                'region_id' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => '10',
                'name' => 'Jubail',
                'region_id' => '4',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => '11',
                'name' => 'Qassim',
                'region_id' => '1',
                'created_at' => '2016-09-25 02:09:21',
                'updated_at' => '2016-09-25 02:09:21',
            ),
            6 => 
            array (
                'id' => '12',
                'name' => 'Madina',
                'region_id' => '3',
                'created_at' => '2016-09-25 02:10:13',
                'updated_at' => '2016-09-25 02:10:13',
            ),
            7 => 
            array (
                'id' => '13',
                'name' => 'Ahsa',
                'region_id' => '1',
                'created_at' => '2016-09-25 02:10:40',
                'updated_at' => '2016-09-25 02:10:40',
            ),
            8 => 
            array (
                'id' => '15',
                'name' => 'Dammam',
                'region_id' => '2',
                'created_at' => '2016-09-25 02:11:47',
                'updated_at' => '2016-09-25 02:11:47',
            ),
        ));
        
        
    }
}
