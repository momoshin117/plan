<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('favorites')->truncate();
        
        DB::table('favorites')->insert([
                'user_id' =>'1',
                'spot_master_id' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('favorites')->insert([
                'user_id' =>'3',
                'spot_master_id' => '2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        
        DB::table('favorites')->insert([
                'user_id' =>'3',
                'spot_master_id' => '10',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
