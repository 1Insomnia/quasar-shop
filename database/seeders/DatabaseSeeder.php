<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

use Database\Seeders\ProductCategorySeeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BrandSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}