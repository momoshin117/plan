<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->truncate();
        
        DB::table('categories')->insert([
                'category' => 'ホテル',
         ]);
        
        DB::table('categories')->insert([
                'category' => 'レストラン',
         ]);
        
        DB::table('categories')->insert([
                'category' => '観光スポット',
         ]);
        
        
    }
}
