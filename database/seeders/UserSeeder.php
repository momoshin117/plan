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
    }
}
