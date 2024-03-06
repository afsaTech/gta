<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password'=>''
        ]);


        $this->call(PackageSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(TopNotchDestinationSeeder::class);
    }
}
