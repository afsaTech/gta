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
        $this->call(CreateAdminUserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(TopNotchDestinationSeeder::class);
    }
}
