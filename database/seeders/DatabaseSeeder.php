<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CategorySeeder;
use Illuminate\Database\Seeder;
use App\Models\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {
        $this->call(
            CategorySeeder::class,
            ProductSeeder::class,
            
        );
    }
}
