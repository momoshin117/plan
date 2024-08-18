<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParkingCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parking_cars')->truncate();
        
        DB::table('parking_cars')->insert([
                'number' => '10台未満',
         ]);
         
        DB::table('parking_cars')->insert([
                'number' => '10～50台',
        ]);
        
        DB::table('parking_cars')->insert([
                'number' => '51～100台',
         ]);
         
        DB::table('parking_cars')->insert([
                'number' => '101台以上',
        ]);
    }
}
