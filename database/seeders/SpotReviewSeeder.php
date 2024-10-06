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
                'user_id' =>'1',
                'spot_master_id' => '1',
                'score' =>'5',
                'comment' => '景色がきれいでした。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'2',
                'spot_master_id' => '1',
                'score' =>'3',
                'comment' => 'チェックインに時間がかかりました。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'3',
                'spot_master_id' => '1',
                'score' =>'1',
                'comment' => '部屋の掃除がされてませんでした。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
