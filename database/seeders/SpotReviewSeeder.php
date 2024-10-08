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
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '1',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '2',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '3',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '4',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '5',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '6',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '7',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '8',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '9',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '10',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '11',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '12',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '13',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '14',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '15',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '16',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '17',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '18',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '19',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '20',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '21',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '22',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '23',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '24',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_reviews')->insert([
                'user_id' =>'4',
                'spot_master_id' => '25',
                'score' =>'3',
                'comment' => '特にありません。',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
