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
        $brands = [
            [
                'name' => 'canon'
            ],
            [
                'name' => 'nikon'
            ],
            [
                'name' => 'pentax'
            ],
            [
                'name' => 'irix'
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}