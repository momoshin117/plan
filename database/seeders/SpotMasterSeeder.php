<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpotMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spot_masters')->truncate();
        
        DB::table('spot_masters')->insert([
                'category_id' => '1',
                'spot_name' => '星野リゾートトマム',
                'prefecture_id' => '1',
                'adress' =>'勇払郡占冠村中トマム',
                'bath' => '1',
                'foot' => '徒歩不可',
                'bus' => '1',
                'hotel_food' =>'夕朝食',
                'rakuten_hotel_id' => '30110',
         ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '1',
                'spot_name' => 'ハレクラニ沖縄',
                'prefecture_id' => '47',
                'adress' =>'国頭郡恩納村名嘉真1967-1',
                'bath' => '1',
                'foot' => '徒歩不可',
                'bus' => '0',
                'hotel_food' =>'夕朝食',
                'rakuten_hotel_id' => '172611',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '2',
                'spot_name' => 'バンタカフェ',
                'prefecture_id' => '47',
                'adress' =>'中頭郡読谷村儀間 560',
                'holiday' => 'なし',
                'open_time' => '平日：10～18時、土休日：8～18時',
                'seat' => '約50席',
                'parking_car_id' =>'2',
                'foot' => '徒歩不可',
                'bus' => '0',
                'latitude'=>'26.417849499668577',
                'longitude'=>'127.71399366717395',
        ]);
        
        DB::table('spot_masters')->insert([
                'category_id' => '3',
                'spot_name' => '雲海テラス',
                'prefecture_id' => '1',
                'adress' =>'勇払郡占冠村中トマム',
                'holiday' => '5～10月のみ営業。期間中無休',
                'open_time' => '5:00~8:00',
                'entrance_fee' => '大人 1,900円、小学生 1,200円',
                'parking_car_id' =>'4',
                'foot' => '徒歩不可',
                'bus' => '1',
                'latitude'=>'43.07723904211901',
                'longitude'=>'142.5990632580723',
        ]);
    }
}
