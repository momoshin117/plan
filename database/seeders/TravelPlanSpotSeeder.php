<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 use DateTime;

class TravelPlanSpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('travel_plan_spots')->truncate();
        
        DB::table('travel_plan_spots')->insert([
                'travel_plan_id' => '5',
                'spot_master_id' => '1',
                'arrive_date' => '2024/08/23',
                'arrive_time' => '19:00:00',
                'departure_date' => '2024/08/24',
                'departure_time' => '10:00:00',
                'money' => '10000',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
