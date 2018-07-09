<?php

use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sub_categories')->delete();
        
        \DB::table('sub_categories')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'r1',
                'category_id' => '1',
                'created_at' => '2016-10-17 08:38:54',
                'updated_at' => '2016-10-17 08:38:54',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'r2',
                'category_id' => '1',
                'created_at' => '2016-10-17 08:39:01',
                'updated_at' => '2016-10-17 08:39:01',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'b1',
                'category_id' => '2',
                'created_at' => '2016-10-17 08:39:08',
                'updated_at' => '2016-10-17 08:39:08',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'b2',
                'category_id' => '2',
                'created_at' => '2016-10-17 08:39:13',
                'updated_at' => '2016-10-17 08:39:13',
            ),
            4 => 
            array (
                'id' => '5',
                'name' => 'o1',
                'category_id' => '3',
                'created_at' => '2016-10-17 08:40:15',
                'updated_at' => '2016-10-17 08:40:15',
            ),
            5 => 
            array (
                'id' => '6',
                'name' => 'o2',
                'category_id' => '3',
                'created_at' => '2016-10-17 08:40:18',
                'updated_at' => '2016-10-17 08:40:18',
            ),
            6 => 
            array (
                'id' => '7',
                'name' => 's1',
                'category_id' => '4',
                'created_at' => '2016-10-17 08:40:24',
                'updated_at' => '2016-10-17 08:40:24',
            ),
            7 => 
            array (
                'id' => '8',
                'name' => 's2',
                'category_id' => '4',
                'created_at' => '2016-10-17 08:40:32',
                'updated_at' => '2016-10-17 08:40:32',
            ),
            8 => 
            array (
                'id' => '9',
                'name' => 'a1',
                'category_id' => '5',
                'created_at' => '2016-10-17 08:40:38',
                'updated_at' => '2016-10-17 08:40:38',
            ),
            9 => 
            array (
                'id' => '10',
                'name' => 'a2',
                'category_id' => '5',
                'created_at' => '2016-10-17 08:40:41',
                'updated_at' => '2016-10-17 08:40:41',
            ),
            10 => 
            array (
                'id' => '11',
                'name' => 'p1',
                'category_id' => '6',
                'created_at' => '2016-10-17 08:40:47',
                'updated_at' => '2016-10-17 08:40:47',
            ),
            11 => 
            array (
                'id' => '12',
                'name' => 'p2',
                'category_id' => '6',
                'created_at' => '2016-10-17 08:40:52',
                'updated_at' => '2016-10-17 08:40:52',
            ),
            12 => 
            array (
                'id' => '13',
                'name' => 'bet1',
                'category_id' => '7',
                'created_at' => '2016-10-17 08:40:58',
                'updated_at' => '2016-10-17 08:40:58',
            ),
            13 => 
            array (
                'id' => '14',
                'name' => 'bet2',
                'category_id' => '7',
                'created_at' => '2016-10-17 08:41:02',
                'updated_at' => '2016-10-17 08:41:02',
            ),
            14 => 
            array (
                'id' => '15',
                'name' => 'go90',
                'category_id' => '8',
                'created_at' => '2016-10-17 08:41:10',
                'updated_at' => '2016-10-17 08:41:10',
            ),
            15 => 
            array (
                'id' => '16',
                'name' => 'go980',
                'category_id' => '8',
                'created_at' => '2016-10-17 08:41:15',
                'updated_at' => '2016-10-17 08:41:15',
            ),
            16 => 
            array (
                'id' => '17',
                'name' => 'play1',
                'category_id' => '9',
                'created_at' => '2016-10-17 08:41:31',
                'updated_at' => '2016-10-17 08:41:31',
            ),
            17 => 
            array (
                'id' => '18',
                'name' => 'play78',
                'category_id' => '9',
                'created_at' => '2016-10-17 08:41:34',
                'updated_at' => '2016-10-17 08:41:34',
            ),
            18 => 
            array (
                'id' => '19',
                'name' => 'min1',
                'category_id' => '10',
                'created_at' => '2016-10-17 08:41:40',
                'updated_at' => '2016-10-17 08:41:40',
            ),
            19 => 
            array (
                'id' => '20',
                'name' => 'minx3',
                'category_id' => '10',
                'created_at' => '2016-10-17 08:41:45',
                'updated_at' => '2016-10-17 08:41:45',
            ),
            20 => 
            array (
                'id' => '21',
                'name' => 'home2',
                'category_id' => '11',
                'created_at' => '2016-10-17 08:43:03',
                'updated_at' => '2016-10-17 08:43:03',
            ),
            21 => 
            array (
                'id' => '22',
                'name' => 'home1',
                'category_id' => '11',
                'created_at' => '2016-10-17 08:43:06',
                'updated_at' => '2016-10-17 08:43:06',
            ),
            22 => 
            array (
                'id' => '23',
                'name' => 'fdr-mini',
                'category_id' => '12',
                'created_at' => '2016-10-17 08:43:15',
                'updated_at' => '2016-10-17 08:43:15',
            ),
            23 => 
            array (
                'id' => '24',
                'name' => 'fdr-large',
                'category_id' => '12',
                'created_at' => '2016-10-17 08:43:21',
                'updated_at' => '2016-10-17 08:43:21',
            ),
            24 => 
            array (
                'id' => '25',
                'name' => 'fsr-large',
                'category_id' => '13',
                'created_at' => '2016-10-17 08:43:31',
                'updated_at' => '2016-10-17 08:43:31',
            ),
            25 => 
            array (
                'id' => '26',
                'name' => 'fsr-medium',
                'category_id' => '13',
                'created_at' => '2016-10-17 08:43:35',
                'updated_at' => '2016-10-17 08:43:35',
            ),
            26 => 
            array (
                'id' => '27',
                'name' => 'tmf-small',
                'category_id' => '14',
                'created_at' => '2016-10-17 08:43:45',
                'updated_at' => '2016-10-17 08:43:45',
            ),
            27 => 
            array (
                'id' => '28',
                'name' => 'tmf-large',
                'category_id' => '14',
                'created_at' => '2016-10-17 08:43:50',
                'updated_at' => '2016-10-17 08:43:50',
            ),
            28 => 
            array (
                'id' => '29',
                'name' => 'dw2',
                'category_id' => '15',
                'created_at' => '2016-10-17 08:43:58',
                'updated_at' => '2016-10-17 08:43:58',
            ),
            29 => 
            array (
                'id' => '30',
                'name' => 'dw45',
                'category_id' => '15',
                'created_at' => '2016-10-17 08:44:02',
                'updated_at' => '2016-10-17 08:44:02',
            ),
            30 => 
            array (
                'id' => '31',
                'name' => 'eo-outer',
                'category_id' => '16',
                'created_at' => '2016-10-17 08:44:10',
                'updated_at' => '2016-10-17 08:44:10',
            ),
            31 => 
            array (
                'id' => '32',
                'name' => 'eo-inner',
                'category_id' => '16',
                'created_at' => '2016-10-17 08:44:14',
                'updated_at' => '2016-10-17 08:44:14',
            ),
            32 => 
            array (
                'id' => '33',
                'name' => 'ar3',
                'category_id' => '17',
                'created_at' => '2016-10-17 08:44:21',
                'updated_at' => '2016-10-17 08:44:21',
            ),
            33 => 
            array (
                'id' => '34',
                'name' => 'ar-p50',
                'category_id' => '17',
                'created_at' => '2016-10-17 08:44:25',
                'updated_at' => '2016-10-17 08:44:25',
            ),
            34 => 
            array (
                'id' => '35',
                'name' => 'deco-150',
                'category_id' => '18',
                'created_at' => '2016-10-17 08:44:33',
                'updated_at' => '2016-10-17 08:44:33',
            ),
            35 => 
            array (
                'id' => '36',
                'name' => 'deco-250',
                'category_id' => '18',
                'created_at' => '2016-10-17 08:44:37',
                'updated_at' => '2016-10-17 08:44:37',
            ),
            36 => 
            array (
                'id' => '37',
                'name' => 'next4040',
                'category_id' => '19',
                'created_at' => '2016-10-17 08:44:44',
                'updated_at' => '2016-10-17 08:44:44',
            ),
            37 => 
            array (
                'id' => '38',
                'name' => 'next4080',
                'category_id' => '19',
                'created_at' => '2016-10-17 08:44:48',
                'updated_at' => '2016-10-17 08:44:48',
            ),
            38 => 
            array (
                'id' => '39',
                'name' => 'next-p80',
                'category_id' => '20',
                'created_at' => '2016-10-17 08:45:03',
                'updated_at' => '2016-10-17 08:45:03',
            ),
            39 => 
            array (
                'id' => '40',
                'name' => 'next-p90',
                'category_id' => '20',
                'created_at' => '2016-10-17 08:45:07',
                'updated_at' => '2016-10-17 08:45:07',
            ),
            40 => 
            array (
                'id' => '41',
                'name' => 'it-n50',
                'category_id' => '21',
                'created_at' => '2016-10-17 08:45:18',
                'updated_at' => '2016-10-17 08:45:18',
            ),
            41 => 
            array (
                'id' => '42',
                'name' => 'it-n57',
                'category_id' => '21',
                'created_at' => '2016-10-17 08:45:21',
                'updated_at' => '2016-10-17 08:45:21',
            ),
            42 => 
            array (
                'id' => '43',
                'name' => 'pro-al80',
                'category_id' => '22',
                'created_at' => '2016-10-17 08:45:30',
                'updated_at' => '2016-10-17 08:45:30',
            ),
            43 => 
            array (
                'id' => '44',
                'name' => 'pro-150',
                'category_id' => '22',
                'created_at' => '2016-10-17 08:45:34',
                'updated_at' => '2016-10-17 08:45:34',
            ),
            44 => 
            array (
                'id' => '45',
                'name' => 'pro-alpha-p50',
                'category_id' => '23',
                'created_at' => '2016-10-17 08:45:49',
                'updated_at' => '2016-10-17 08:45:49',
            ),
            45 => 
            array (
                'id' => '46',
                'name' => 'pro-alpha-s50',
                'category_id' => '23',
                'created_at' => '2016-10-17 08:45:54',
                'updated_at' => '2016-10-17 08:45:54',
            ),
            46 => 
            array (
                'id' => '47',
                'name' => 'con#50',
                'category_id' => '24',
                'created_at' => '2016-10-17 08:46:03',
                'updated_at' => '2016-10-17 08:46:03',
            ),
            47 => 
            array (
                'id' => '48',
                'name' => 'con#58',
                'category_id' => '24',
                'created_at' => '2016-10-17 08:46:06',
                'updated_at' => '2016-10-17 08:46:06',
            ),
            48 => 
            array (
                'id' => '49',
                'name' => 'grill#58',
                'category_id' => '25',
                'created_at' => '2016-10-17 08:46:14',
                'updated_at' => '2016-10-17 08:46:14',
            ),
            49 => 
            array (
                'id' => '50',
                'name' => 'grill#80',
                'category_id' => '25',
                'created_at' => '2016-10-17 08:46:17',
                'updated_at' => '2016-10-17 08:46:17',
            ),
            50 => 
            array (
                'id' => '51',
                'name' => 'solo#50',
                'category_id' => '26',
                'created_at' => '2016-10-17 08:46:25',
                'updated_at' => '2016-10-17 08:46:25',
            ),
            51 => 
            array (
                'id' => '52',
                'name' => 'solo#80',
                'category_id' => '26',
                'created_at' => '2016-10-17 08:46:28',
                'updated_at' => '2016-10-17 08:46:28',
            ),
            52 => 
            array (
                'id' => '53',
                'name' => 'drum#140',
                'category_id' => '27',
                'created_at' => '2016-10-17 08:46:49',
                'updated_at' => '2016-10-17 08:46:49',
            ),
            53 => 
            array (
                'id' => '54',
                'name' => 'drum#258',
                'category_id' => '27',
                'created_at' => '2016-10-17 08:46:53',
                'updated_at' => '2016-10-17 08:46:53',
            ),
            54 => 
            array (
                'id' => '55',
                'name' => 'can-50',
                'category_id' => '28',
                'created_at' => '2016-10-17 08:47:03',
                'updated_at' => '2016-10-17 08:47:03',
            ),
            55 => 
            array (
                'id' => '56',
                'name' => 'can-583',
                'category_id' => '28',
                'created_at' => '2016-10-17 08:47:07',
                'updated_at' => '2016-10-17 08:47:07',
            ),
            56 => 
            array (
                'id' => '57',
                'name' => 'max-583',
                'category_id' => '29',
                'created_at' => '2016-10-17 08:47:13',
                'updated_at' => '2016-10-17 08:47:13',
            ),
            57 => 
            array (
                'id' => '58',
                'name' => 'max-583',
                'category_id' => '29',
                'created_at' => '2016-10-17 08:47:17',
                'updated_at' => '2016-10-17 08:47:17',
            ),
            58 => 
            array (
                'id' => '59',
                'name' => 'turbo#53',
                'category_id' => '30',
                'created_at' => '2016-10-17 08:47:27',
                'updated_at' => '2016-10-17 08:47:27',
            ),
            59 => 
            array (
                'id' => '60',
                'name' => 'turbo#58',
                'category_id' => '30',
                'created_at' => '2016-10-17 08:47:30',
                'updated_at' => '2016-10-17 08:47:30',
            ),
            60 => 
            array (
                'id' => '61',
                'name' => 'crysytal#58',
                'category_id' => '31',
                'created_at' => '2016-10-17 08:47:39',
                'updated_at' => '2016-10-17 08:47:39',
            ),
            61 => 
            array (
                'id' => '62',
                'name' => 'crysytal#50',
                'category_id' => '31',
                'created_at' => '2016-10-17 08:47:42',
                'updated_at' => '2016-10-17 08:47:42',
            ),
            62 => 
            array (
                'id' => '63',
                'name' => 'twin#150',
                'category_id' => '32',
                'created_at' => '2016-10-17 08:47:50',
                'updated_at' => '2016-10-17 08:47:50',
            ),
            63 => 
            array (
                'id' => '64',
                'name' => 'twin#58',
                'category_id' => '32',
                'created_at' => '2016-10-17 08:47:54',
                'updated_at' => '2016-10-17 08:47:54',
            ),
            64 => 
            array (
                'id' => '65',
                'name' => 'sbs#58',
                'category_id' => '33',
                'created_at' => '2016-10-17 08:48:07',
                'updated_at' => '2016-10-17 08:48:07',
            ),
            65 => 
            array (
                'id' => '66',
                'name' => 'sbs#583',
                'category_id' => '33',
                'created_at' => '2016-10-17 08:48:10',
                'updated_at' => '2016-10-17 08:48:10',
            ),
            66 => 
            array (
                'id' => '67',
                'name' => 'door#80',
                'category_id' => '34',
                'created_at' => '2016-10-17 08:48:19',
                'updated_at' => '2016-10-17 08:48:19',
            ),
            67 => 
            array (
                'id' => '68',
                'name' => 'door#30',
                'category_id' => '34',
                'created_at' => '2016-10-17 08:48:23',
                'updated_at' => '2016-10-17 08:48:23',
            ),
            68 => 
            array (
                'id' => '69',
                'name' => 'dryer#30',
                'category_id' => '35',
                'created_at' => '2016-10-17 08:48:31',
                'updated_at' => '2016-10-17 08:48:31',
            ),
            69 => 
            array (
                'id' => '70',
                'name' => 'dryer#58',
                'category_id' => '35',
                'created_at' => '2016-10-17 08:48:34',
                'updated_at' => '2016-10-17 08:48:34',
            ),
            70 => 
            array (
                'id' => '71',
                'name' => 'fl#58',
                'category_id' => '36',
                'created_at' => '2016-10-17 08:48:41',
                'updated_at' => '2016-10-17 08:48:41',
            ),
            71 => 
            array (
                'id' => '72',
                'name' => 'fl#5875.',
                'category_id' => '36',
                'created_at' => '2016-10-17 08:48:44',
                'updated_at' => '2016-10-17 08:48:44',
            ),
            72 => 
            array (
                'id' => '73',
                'name' => 'fl-n58',
                'category_id' => '37',
                'created_at' => '2016-10-17 08:48:54',
                'updated_at' => '2016-10-17 08:48:54',
            ),
            73 => 
            array (
                'id' => '74',
                'name' => 'fl-n874',
                'category_id' => '37',
                'created_at' => '2016-10-17 08:49:01',
                'updated_at' => '2016-10-17 08:49:01',
            ),
            74 => 
            array (
                'id' => '75',
                'name' => 'tl#58',
                'category_id' => '38',
                'created_at' => '2016-10-17 08:49:11',
                'updated_at' => '2016-10-17 08:49:11',
            ),
            75 => 
            array (
                'id' => '76',
                'name' => 'tl#78',
                'category_id' => '38',
                'created_at' => '2016-10-17 08:49:16',
                'updated_at' => '2016-10-17 08:49:16',
            ),
            76 => 
            array (
                'id' => '77',
                'name' => 'tt#78',
                'category_id' => '39',
                'created_at' => '2016-10-17 08:49:22',
                'updated_at' => '2016-10-17 08:49:22',
            ),
            77 => 
            array (
                'id' => '78',
                'name' => 'tt#58',
                'category_id' => '39',
                'created_at' => '2016-10-17 08:49:26',
                'updated_at' => '2016-10-17 08:49:26',
            ),
            78 => 
            array (
                'id' => '79',
                'name' => 'PDP#10',
                'category_id' => '40',
                'created_at' => '2016-10-17 08:49:36',
                'updated_at' => '2016-10-17 08:49:36',
            ),
            79 => 
            array (
                'id' => '80',
                'name' => 'PDP#20',
                'category_id' => '40',
                'created_at' => '2016-10-17 08:49:41',
                'updated_at' => '2016-10-17 08:49:41',
            ),
            80 => 
            array (
                'id' => '81',
                'name' => 'p-258',
                'category_id' => '41',
                'created_at' => '2016-10-17 08:49:52',
                'updated_at' => '2016-10-17 08:49:52',
            ),
            81 => 
            array (
                'id' => '82',
                'name' => 'p-25',
                'category_id' => '41',
                'created_at' => '2016-10-17 08:49:56',
                'updated_at' => '2016-10-17 08:49:56',
            ),
            82 => 
            array (
                'id' => '83',
                'name' => 'led#25',
                'category_id' => '42',
                'created_at' => '2016-10-17 08:50:05',
                'updated_at' => '2016-10-17 08:50:05',
            ),
            83 => 
            array (
                'id' => '84',
                'name' => 'led#s#20',
                'category_id' => '42',
                'created_at' => '2016-10-17 08:50:10',
                'updated_at' => '2016-10-17 08:50:10',
            ),
            84 => 
            array (
                'id' => '86',
                'name' => 'NULL',
                'category_id' => '43',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
