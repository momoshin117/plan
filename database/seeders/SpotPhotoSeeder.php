<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class SpotPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spot_photos')->truncate();
        
        DB::table('spot_photos')->insert([
            'spot_master_id' => '11',
            'path' =>'https://res.cloudinary.com/dk03qm4lz/image/upload/v1728348119/qvx6r8zdh2dkdsdnlvhc.webp',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_photos')->insert([
            'spot_master_id' => '12',
            'path' =>'https://res.cloudinary.com/dk03qm4lz/image/upload/v1728348032/n1urnxmsc5ih4b09nhia.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_photos')->insert([
            'spot_master_id' => '13',
            'path' =>'https://res.cloudinary.com/dk03qm4lz/image/upload/v1728348307/tpw96uuyxm4nqhwzrtyk.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_photos')->insert([
            'spot_master_id' => '14',
            'path' =>'https://res.cloudinary.com/dk03qm4lz/image/upload/v1728348390/q68pnlo5zxrm406km4fm.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_photos')->insert([
            'spot_master_id' => '15',
            'path' =>'https://res.cloudinary.com/dk03qm4lz/image/upload/v1728348977/h0yjpifawk43i34uvbft.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_photos')->insert([
            'spot_master_id' => '16',
            'path' =>'https://res.cloudinary.com/dk03qm4lz/image/upload/v1728349158/zymk5wl8efhgviyfzzol.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_photos')->insert([
            'spot_master_id' => '17',
            'path' =>'https://res.cloudinary.com/dk03qm4lz/image/upload/v1728349244/ansohmsltsrdjsq3ynrx.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_photos')->insert([
            'spot_master_id' => '18',
            'path' =>'https://res.cloudinary.com/dk03qm4lz/image/upload/v1728349292/quxqtgdoe4hqmwh11cxq.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_photos')->insert([
            'spot_master_id' => '19',
            'path' =>'https://res.cloudinary.com/dk03qm4lz/image/upload/v1728349339/gvdmk37wqmtjkrwg3sps.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_photos')->insert([
            'spot_master_id' => '20',
            'path' =>'https://res.cloudinary.com/dk03qm4lz/image/upload/v1728349398/puqxyskqzhphemxpveb0.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_photos')->insert([
            'spot_master_id' => '21',
            'path' =>'https://res.cloudinary.com/dk03qm4lz/image/upload/v1728349519/cluzyvkj2hn82by4hf5o.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_photos')->insert([
            'spot_master_id' => '22',
            'path' =>'https://res.cloudinary.com/dk03qm4lz/image/upload/v1728349605/mv0dx8xz14v9hgqh6fii.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_photos')->insert([
            'spot_master_id' => '23',
            'path' =>'https://res.cloudinary.com/dk03qm4lz/image/upload/v1728349724/eznkkhwyqbreeq49yqxg.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_photos')->insert([
            'spot_master_id' => '24',
            'path' =>'https://res.cloudinary.com/dk03qm4lz/image/upload/v1728349834/wc2xsufolu0g494p9fek.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('spot_photos')->insert([
            'spot_master_id' => '25',
            'path' =>'https://res.cloudinary.com/dk03qm4lz/image/upload/v1728349922/o3tfdawwhjotzpljck8p.jpg',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
    }
}
