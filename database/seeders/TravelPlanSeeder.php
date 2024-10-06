<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class TravelPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('travel_plans')->truncate();
        
        DB::table('travel_plans')->insert([
            'user_id' => '1',
            'plan_name' => '2408_北海道旅行',
            'departure_date' => '2024-08-23',
            'long' =>'3',
            'money' => '30000',
            'disclose' => '公開',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('travel_plans')->insert([
            'user_id' => '2',
            'plan_name' => '2409_京都旅行',
            'departure_date' => '2024-09-01',
            'long' =>'2',
            'money' => '20000',
            'disclose' => '非公開',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('travel_plans')->insert([
            'user_id' => '3',
            'plan_name' => '2408_沖縄旅行',
            'departure_date' => '2024-08-01',
            'long' =>'5',
            'money' => '80000',
            'disclose' => '公開',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
