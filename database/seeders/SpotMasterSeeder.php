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
                'parking_car_id' =>'4',
                'foot' => '徒歩不可',
                'bus' => '1',
         ]);
        //
    }
}
