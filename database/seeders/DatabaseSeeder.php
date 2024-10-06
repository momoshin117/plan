<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ParkingCarSeeder::class,
            PrefectureSeeder::class,
            SpotMasterSeeder::class,
            FavoriteSeeder::class,
            UserSeeder::class,
            TravelPlanSeeder::class,
            TravelPlanSpotSeeder::class,
            SpotReviewSeeder::class,
            
            /*下記は初期化する場合のみ
            TravelPlanSpotSeeder::class,
            SpotReviewSeeder::class,
            */
        ]);
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
