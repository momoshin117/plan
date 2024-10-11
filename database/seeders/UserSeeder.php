<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        
        DB::table('users')->insert([
            'role_id' => '0',
            'name' => '管理者用アカウント01',
            'email' => 'admin@gmail.com',
            'password' =>Hash::make('admin'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'nickname' =>'administrator',
        ]);
        
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'ゲスト01',
            'email' => 'guest01@gmail.com',
            'password' =>Hash::make('guest01'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'nickname' =>'guest01',
        ]);
        
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'ゲスト02',
            'email' => 'guest02@gmail.com',
            'password' =>Hash::make('guest02'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'nickname' =>'guest02',
        ]);
        
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'レビュー',
            'email' => 'review@gmail.com',
            'password' =>Hash::make('review'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'nickname' =>'review',
        ]);
        
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'レビュー',
            'email' => 'review@gmail.com',
            'password' =>Hash::make('review'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'nickname' =>'review',
        ]);
        
         DB::table('users')->insert([
            'role_id'=>'1',
            'name'=> 'Shintaro',
            'email'=> 'shintaro.cm@gmail.com',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
    }
}
