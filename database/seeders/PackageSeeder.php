<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
           // Seed 10 packages with sample data
           for ($i = 1; $i <= 10; $i++) {
            DB::table('packages')->insert([
                'category_id' => rand(1, 3), // Replace with the actual type IDs
                'title' =>'Sunset view of beautiful lakeside resident',
                'image'=>'',
                'description' =>fake()->paragraph(20),
                'size' => rand(1, 20),
                'days' => rand(1, 14),
                'nights' => rand(1, 14),
                // 'startDate'=>now(),
                // 'endDate'=>now()->addDays(7),
                'regular_price' => rand(10000, 1000000),
                'sales_price' => rand(80, 900),
                'discount' => rand(0, 20),
                'region' => "Arusha",
                // 'park' => 'Serngeti',
                'destination'=> 'Serengeti',
                'date'=> now(),
                // 'includedServices'=>'Transport,Tents,Umbrellar',
                // 'excludedServices'=>'Food,Hotel',
                // 'booking_status' => 'available',
                // 'highlights'=>fake()->paragraph(3),
                // 'gear'=>'Safe boot,Jacket',
                'status'=>'active',
                'created_at' => now(),
                'updated_at' => now(),
                // Add more fields and sample data as needed
            ]);
        }
    }

}
