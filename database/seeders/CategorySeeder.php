<?php

namespace Database\Seeders;

use App\Models\Packages\Category;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Seed categories with sample data
        for ($i = 1; $i <= 10; $i++) {
            $name = $faker->word;
            $slug = Str::slug($name);

            // Ensure slug uniqueness
            $uniqueSlug = $slug;
            $counter = 1;
            while (Category::where('slug', $uniqueSlug)->exists()) {
                $uniqueSlug = $slug . '-' . $counter;
                $counter++;
            }

            Category::create([
                'name' => $name,
                'slug' => $uniqueSlug,
                'description' => $faker->sentence,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
