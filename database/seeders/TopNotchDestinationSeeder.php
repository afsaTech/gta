<?php

namespace Database\Seeders;

use App\Models\TopNotchDestination;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TopNotchDestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_TZ'); // Set the Faker locale to English Tanzania

        // Seed top notch destinations with sample data
        for ($i = 1; $i <= 10; $i++) {
            TopNotchDestination::create([
                'name' => $faker->word,
                'description' => $faker->paragraph,
                'location' => $faker->city . ', Tanzania', // Ensure city is from Tanzania
                'rating' => $faker->randomFloat(1, 1, 5), // Random rating between 1 and 5
                'image_url' => null, 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
