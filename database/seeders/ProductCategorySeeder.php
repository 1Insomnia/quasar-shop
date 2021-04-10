<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_categories = [
            [
                'name' => 'cameras',
                'status' => '1',
            ],
            [
                'name' => 'lenses',
                'status' => '1',
            ],
        ];

        foreach ($product_categories as $product_category) {
            ProductCategory::create($product_category);
        }
    }
}