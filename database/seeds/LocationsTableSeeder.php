<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('locations')->delete();
        
        \DB::table('locations')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'King Khaled Rd.',
                'city_id' => '11',
                'created_at' => '2016-09-25 02:09:34',
                'updated_at' => '2016-09-25 02:09:34',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'King Abdullah Rd.',
                'city_id' => '8',
                'created_at' => '2016-09-25 02:09:48',
                'updated_at' => '2016-09-25 02:09:48',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'Quaba Rd.',
                'city_id' => '12',
                'created_at' => '2016-09-25 02:10:23',
                'updated_at' => '2016-09-25 02:10:23',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'Dahran Rd.',
                'city_id' => '13',
                'created_at' => '2016-09-25 02:10:57',
                'updated_at' => '2016-09-25 02:10:57',
            ),
            4 => 
            array (
                'id' => '5',
                'name' => 'Al Thuriyat Rd.',
                'city_id' => '13',
                'created_at' => '2016-09-25 02:11:13',
                'updated_at' => '2016-09-25 02:11:13',
            ),
            5 => 
            array (
                'id' => '6',
                'name' => 'Khaleej Rd.',
                'city_id' => '15',
                'created_at' => '2016-09-25 02:11:57',
                'updated_at' => '2016-09-25 02:11:57',
            ),
            6 => 
            array (
                'id' => '7',
                'name' => 'Malik Rd.',
                'city_id' => '6',
                'created_at' => '2016-09-25 02:12:21',
                'updated_at' => '2016-09-25 02:12:21',
            ),
            7 => 
            array (
                'id' => '8',
                'name' => 'Makrona Rd.',
                'city_id' => '6',
                'created_at' => '2016-09-25 02:12:28',
                'updated_at' => '2016-09-25 02:12:28',
            ),
            8 => 
            array (
                'id' => '9',
                'name' => 'Olaya St.',
                'city_id' => '8',
                'created_at' => '2016-09-25 02:12:46',
                'updated_at' => '2016-09-25 02:12:46',
            ),
            9 => 
            array (
                'id' => '10',
                'name' => '40 St.',
                'city_id' => '8',
                'created_at' => '2016-09-25 02:12:55',
                'updated_at' => '2016-09-25 02:12:55',
            ),
            10 => 
            array (
                'id' => '11',
                'name' => 'Salman Al Farsi St.',
                'city_id' => '8',
                'created_at' => '2016-09-25 02:13:04',
                'updated_at' => '2016-09-25 02:13:04',
            ),
            11 => 
            array (
                'id' => '12',
                'name' => 'Exit 21',
                'city_id' => '8',
                'created_at' => '2016-09-25 02:13:12',
                'updated_at' => '2016-09-25 02:13:12',
            ),
            12 => 
            array (
                'id' => '13',
                'name' => 'Exit 26',
                'city_id' => '8',
                'created_at' => '2016-09-25 02:13:21',
                'updated_at' => '2016-09-25 02:13:21',
            ),
        ));
        
        
    }
}
