<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_images = [
            [
                'image_path' => 'assets/img/product/canon/EOS_4000D/1.jpg',
                'product_id' => 24,
            ],
            [
                'image_path' => 'assets/img/product/canon/EOS_4000D/2.jpg',
                'product_id' => 24,
            ],
            [
                'image_path' => 'assets/img/product/canon/EOS_4000D/3.jpg',
                'product_id' => 24,
            ],
            [
                'image_path' => 'assets/img/product/canon/EOS_4000D/4.jpg',
                'product_id' => 24,
            ],
        ];

        foreach ($product_images as $product_image) {
            ProductImage::create($product_image);
        }
    }
}