<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prefectures')->truncate();
        
        DB::table('prefectures')->insert([
            'prefecture' => '北海道',
        ]);
         
        DB::table('prefectures')->insert([
            'prefecture' => '青森県',
        ]);
         
        DB::table('prefectures')->insert([
            'prefecture' => '岩手県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '宮城県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '秋田県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '山形県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '福島県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '茨城県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '栃木県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '群馬県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '埼玉県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '千葉県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '東京都',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '神奈川県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '新潟県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '山梨県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '長野県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '富山県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '石川県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '福井県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '岐阜県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '静岡県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '愛知県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '三重県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '滋賀県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '京都府',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '大阪府',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '兵庫県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '奈良県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '和歌山県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '鳥取県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '島根県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '岡山県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '広島県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '山口県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '徳島県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '香川県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '愛媛県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '高知県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '福岡県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '佐賀県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '長崎県',
        ]);
        
        
        DB::table('prefectures')->insert([
            'prefecture' => '熊本県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '大分県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '宮崎県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '鹿児島県',
        ]);
        
        DB::table('prefectures')->insert([
            'prefecture' => '沖縄県',
        ]);
    }
}
