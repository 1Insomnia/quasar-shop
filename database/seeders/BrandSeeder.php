<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'nikon',
        ]);

        Brand::create([
            'name' => 'canon',
        ]);

        Brand::create([
            'name' => 'pentax',
        ]);

        Brand::create([
            'name' => 'irix',
        ]);
    }
}