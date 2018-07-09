<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'RTwin Cooling',
                'created_at' => '2016-10-17 08:11:22',
                'updated_at' => '2016-10-17 08:11:22',
                'item_id' => '8',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Borocay',
                'created_at' => '2016-10-17 08:12:48',
                'updated_at' => '2016-10-17 08:12:48',
                'item_id' => '5',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'OLED',
                'created_at' => '2016-10-17 08:12:59',
                'updated_at' => '2016-10-17 08:12:59',
                'item_id' => '1',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'SUHD',
                'created_at' => '2016-10-17 08:13:13',
                'updated_at' => '2016-10-17 08:13:13',
                'item_id' => '11',
            ),
            4 => 
            array (
                'id' => '5',
                'name' => 'Air',
                'created_at' => '2016-10-17 08:13:24',
                'updated_at' => '2016-10-17 08:13:24',
                'item_id' => '2',
            ),
            5 => 
            array (
                'id' => '6',
                'name' => 'PAC',
                'created_at' => '2016-10-17 08:13:40',
                'updated_at' => '2016-10-17 08:13:40',
                'item_id' => '5',
            ),
            6 => 
            array (
                'id' => '7',
                'name' => 'Better',
                'created_at' => '2016-10-17 08:13:50',
                'updated_at' => '2016-10-17 08:13:50',
                'item_id' => '5',
            ),
            7 => 
            array (
                'id' => '8',
                'name' => 'Good1',
                'created_at' => '2016-10-17 08:14:02',
                'updated_at' => '2016-10-17 08:14:02',
                'item_id' => '5',
            ),
            8 => 
            array (
                'id' => '9',
                'name' => 'Players',
                'created_at' => '2016-10-17 08:14:19',
                'updated_at' => '2016-10-17 08:14:19',
                'item_id' => '2',
            ),
            9 => 
            array (
                'id' => '10',
                'name' => 'Mini HiFi	',
                'created_at' => '2016-10-17 08:14:29',
                'updated_at' => '2016-10-17 08:14:29',
                'item_id' => '5',
            ),
            10 => 
            array (
                'id' => '11',
                'name' => 'Home Theatres',
                'created_at' => '2016-10-17 08:14:43',
                'updated_at' => '2016-10-17 08:14:43',
                'item_id' => '5',
            ),
            11 => 
            array (
                'id' => '12',
                'name' => 'FDR',
                'created_at' => '2016-10-17 08:14:54',
                'updated_at' => '2016-10-17 08:14:54',
                'item_id' => '8',
            ),
            12 => 
            array (
                'id' => '13',
                'name' => 'FSR',
                'created_at' => '2016-10-17 08:15:02',
                'updated_at' => '2016-10-17 08:15:02',
                'item_id' => '8',
            ),
            13 => 
            array (
                'id' => '14',
                'name' => 'TMF',
                'created_at' => '2016-10-17 08:15:08',
                'updated_at' => '2016-10-17 08:15:08',
                'item_id' => '8',
            ),
            14 => 
            array (
                'id' => '15',
                'name' => 'DW',
                'created_at' => '2016-10-17 08:15:19',
                'updated_at' => '2016-10-17 08:17:13',
                'item_id' => '6',
            ),
            15 => 
            array (
                'id' => '16',
                'name' => 'EO',
                'created_at' => '2016-10-17 08:17:24',
                'updated_at' => '2016-10-17 08:17:24',
                'item_id' => '7',
            ),
            16 => 
            array (
                'id' => '17',
                'name' => 'ARKE\'',
                'created_at' => '2016-10-17 08:17:36',
                'updated_at' => '2016-10-17 08:17:36',
                'item_id' => '10',
            ),
            17 => 
            array (
                'id' => '18',
                'name' => 'DECO',
                'created_at' => '2016-10-17 08:17:43',
                'updated_at' => '2016-10-17 08:17:43',
                'item_id' => '10',
            ),
            18 => 
            array (
                'id' => '19',
                'name' => 'Next GRAND',
                'created_at' => '2016-10-17 08:17:49',
                'updated_at' => '2016-10-17 08:17:56',
                'item_id' => '10',
            ),
            19 => 
            array (
                'id' => '20',
                'name' => 'NEXT',
                'created_at' => '2016-10-17 08:18:05',
                'updated_at' => '2016-10-17 08:18:05',
                'item_id' => '10',
            ),
            20 => 
            array (
                'id' => '21',
                'name' => 'ITALA',
                'created_at' => '2016-10-17 08:18:14',
                'updated_at' => '2016-10-17 08:18:14',
                'item_id' => '10',
            ),
            21 => 
            array (
                'id' => '22',
                'name' => 'Pro STRETCH	',
                'created_at' => '2016-10-17 08:18:27',
                'updated_at' => '2016-10-17 08:18:27',
                'item_id' => '10',
            ),
            22 => 
            array (
                'id' => '23',
                'name' => 'PRO',
                'created_at' => '2016-10-17 08:18:36',
                'updated_at' => '2016-10-17 08:18:36',
                'item_id' => '10',
            ),
            23 => 
            array (
                'id' => '24',
                'name' => 'Convection',
                'created_at' => '2016-10-17 08:18:45',
                'updated_at' => '2016-10-17 08:18:45',
                'item_id' => '3',
            ),
            24 => 
            array (
                'id' => '25',
                'name' => 'Grill',
                'created_at' => '2016-10-17 08:18:52',
                'updated_at' => '2016-10-17 08:18:52',
                'item_id' => '3',
            ),
            25 => 
            array (
                'id' => '26',
                'name' => 'Solo Microwave',
                'created_at' => '2016-10-17 08:19:00',
                'updated_at' => '2016-10-17 08:19:00',
                'item_id' => '3',
            ),
            26 => 
            array (
                'id' => '27',
                'name' => 'Drum',
                'created_at' => '2016-10-17 08:19:11',
                'updated_at' => '2016-10-17 08:19:11',
                'item_id' => '4',
            ),
            27 => 
            array (
                'id' => '28',
                'name' => 'Canister',
                'created_at' => '2016-10-17 08:19:21',
                'updated_at' => '2016-10-17 08:19:21',
                'item_id' => '4',
            ),
            28 => 
            array (
                'id' => '29',
                'name' => 'MAX',
                'created_at' => '2016-10-17 08:19:31',
                'updated_at' => '2016-10-17 08:19:31',
                'item_id' => '4',
            ),
            29 => 
            array (
                'id' => '30',
                'name' => 'TURBO PLUS	',
                'created_at' => '2016-10-17 08:19:37',
                'updated_at' => '2016-10-17 08:19:37',
                'item_id' => '4',
            ),
            30 => 
            array (
                'id' => '31',
                'name' => 'Crystal Plus',
                'created_at' => '2016-10-17 08:19:45',
                'updated_at' => '2016-10-17 08:19:45',
                'item_id' => '4',
            ),
            31 => 
            array (
                'id' => '32',
                'name' => 'Twins',
                'created_at' => '2016-10-17 08:19:57',
                'updated_at' => '2016-10-17 08:19:57',
                'item_id' => '8',
            ),
            32 => 
            array (
                'id' => '33',
                'name' => 'SBS',
                'created_at' => '2016-10-17 08:20:03',
                'updated_at' => '2016-10-17 08:20:12',
                'item_id' => '8',
            ),
            33 => 
            array (
                'id' => '34',
                'name' => '1 Door',
                'created_at' => '2016-10-17 08:20:36',
                'updated_at' => '2016-10-17 08:20:36',
                'item_id' => '8',
            ),
            34 => 
            array (
                'id' => '35',
                'name' => 'Dryer',
                'created_at' => '2016-10-17 08:20:44',
                'updated_at' => '2016-10-17 08:20:44',
                'item_id' => '9',
            ),
            35 => 
            array (
                'id' => '36',
                'name' => 'FL',
                'created_at' => '2016-10-17 08:20:54',
                'updated_at' => '2016-10-17 08:20:54',
                'item_id' => '9',
            ),
            36 => 
            array (
                'id' => '37',
                'name' => 'FL combo	',
                'created_at' => '2016-10-17 08:21:01',
                'updated_at' => '2016-10-17 08:21:01',
                'item_id' => '9',
            ),
            37 => 
            array (
                'id' => '38',
                'name' => 'TL',
                'created_at' => '2016-10-17 08:21:12',
                'updated_at' => '2016-10-17 08:21:12',
                'item_id' => '9',
            ),
            38 => 
            array (
                'id' => '39',
                'name' => 'TT',
                'created_at' => '2016-10-17 08:21:18',
                'updated_at' => '2016-10-17 08:21:23',
                'item_id' => '9',
            ),
            39 => 
            array (
                'id' => '40',
                'name' => 'PDP',
                'created_at' => '2016-10-17 08:21:32',
                'updated_at' => '2016-10-17 08:21:32',
                'item_id' => '11',
            ),
            40 => 
            array (
                'id' => '41',
                'name' => 'UHD',
                'created_at' => '2016-10-17 08:21:39',
                'updated_at' => '2016-10-17 08:21:39',
                'item_id' => '11',
            ),
            41 => 
            array (
                'id' => '42',
                'name' => 'LED',
                'created_at' => '2016-10-17 08:21:45',
                'updated_at' => '2016-10-17 08:21:45',
                'item_id' => '11',
            ),
            42 => 
            array (
                'id' => '43',
                'name' => 'NULL',
                'created_at' => NULL,
                'updated_at' => NULL,
                'item_id' => NULL,
            ),
        ));
        
        
    }
}
