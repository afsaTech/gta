<?php

namespace Database\Seeders;

use App\Models\Packages\Package;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_TZ'); // Set the Faker locale to English Tanzania

        // Seed 10 packages with sample data
        for ($i = 1; $i <= 10; $i++) {
            Package::create([
                'category_id' => rand(1, 3),
                'title' => $faker->sentence,
                'description' => $faker->paragraph(20),
                'size' => rand(1, 20),
                'days' => rand(1, 14),
                'nights' => rand(1, 14),
                'regular_price' => rand(10000, 1000000) / 100,
                'sales_price' => rand(80, 900),
                'discount' => rand(0, 30),
                'region' => $faker->city,
                'destination' => $faker->city,
                'date' => Carbon::now()->addDays(30)->toDateString(),
                'keyword' => $faker->words(3, true),
                'is_popular' => 'yes',
                'status' => 'available',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
