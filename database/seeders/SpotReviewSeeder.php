<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class SpotReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spot_reviews')->truncate();
        
        DB::table('spot_reviews')->insert([
                'spot_master_id' => '1',
                'score' =>'5',
                'commment' => '景色がきれいでした。',
                'nickname' => 'リンゴ',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
    }
}
