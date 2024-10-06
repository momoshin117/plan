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
                'travel_plan_id' => '1',
                'spot_master_id' => '2',
                'arrive_date' => '2024-08-23',
                'arrive_time' => '19:00:00',
                'departure_date' => '2024-08-24',
                'departure_time' => '10:00:00',
                'money' => '10000',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('travel_plan_spots')->insert([
                'travel_plan_id' => '1',
                'spot_master_id' => '11',
                'arrive_date' => '2024-08-23',
                'arrive_time' => '12:00:00',
                'departure_date' => '2024-08-23',
                'departure_time' => '13:00:00',
                'money' => '1200',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('travel_plan_spots')->insert([
                'travel_plan_id' => '1',
                'spot_master_id' => '17',
                'arrive_date' => '2024-08-23',
                'arrive_time' => '14:30:00',
                'departure_date' => '2024-08-23',
                'departure_time' => '15:30:00',
                'money' => '1000',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('travel_plan_spots')->insert([
                'travel_plan_id' => '1',
                'spot_master_id' => '16',
                'arrive_date' => '2024-08-23',
                'arrive_time' => '21:00:00',
                'departure_date' => '2024-08-23',
                'departure_time' => '22:00:00',
                'money' => '1500',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('travel_plan_spots')->insert([
                'travel_plan_id' => '1',
                'spot_master_id' => '18',
                'arrive_date' => '2024-08-24',
                'arrive_time' => '11:00:00',
                'departure_date' => '2024-08-24',
                'departure_time' => '12:00:00',
                'money' => '0',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('travel_plan_spots')->insert([
                'travel_plan_id' => '2',
                'spot_master_id' => '7',
                'arrive_date' => '2024-09-01',
                'arrive_time' => '18:00:00',
                'departure_date' => '2024-09-02',
                'departure_time' => '10:00:00',
                'money' => '18000',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('travel_plan_spots')->insert([
                'travel_plan_id' => '3',
                'spot_master_id' => '10',
                'arrive_date' => '2024-08-01',
                'arrive_time' => '18:00:00',
                'departure_date' => '2024-08-02',
                'departure_time' => '10:00:00',
                'money' => '30000',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('travel_plan_spots')->insert([
                'travel_plan_id' => '3',
                'spot_master_id' => '14',
                'arrive_date' => '2024-08-01',
                'arrive_time' => '12:00:00',
                'departure_date' => '2024-08-01',
                'departure_time' => '13:00:00',
                'money' => '800',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('travel_plan_spots')->insert([
                'travel_plan_id' => '3',
                'spot_master_id' => '13',
                'arrive_date' => '2024-08-01',
                'arrive_time' => '14:00:00',
                'departure_date' => '2024-08-01',
                'departure_time' => '15:30:00',
                'money' => '1500',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('travel_plan_spots')->insert([
                'travel_plan_id' => '3',
                'spot_master_id' => '25',
                'arrive_date' => '2024-08-02',
                'arrive_time' => '11:00:00',
                'departure_date' => '2024-08-02',
                'departure_time' => '15:00:00',
                'money' => '2180',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('travel_plan_spots')->insert([
                'travel_plan_id' => '3',
                'spot_master_id' => '9',
                'arrive_date' => '2024-08-02',
                'arrive_time' => '18:00:00',
                'departure_date' => '2024-08-03',
                'departure_time' => '10:00:00',
                'money' => '15000',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('travel_plan_spots')->insert([
                'travel_plan_id' => '3',
                'spot_master_id' => '24',
                'arrive_date' => '2024-08-03',
                'arrive_time' => '13:00:00',
                'departure_date' => '2024-08-03',
                'departure_time' => '15:00:00',
                'money' => '2000',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
    }
}
