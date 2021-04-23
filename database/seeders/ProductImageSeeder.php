<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductImage;


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
                'product_id' => 1,
                'image_path' => 'assets/img/product/CANON_EOS_5_MARK_IV_1.jpg',
            ],
            [
                'product_id' => 1,
                'image_path' => 'assets/img/product/CANON_EOS_5_MARK_IV_2.jpg',
            ],
            [
                'product_id' => 1,
                'image_path' => 'assets/img/product/CANON_EOS_5_MARK_IV_3.jpg',
            ],
            [
                'product_id' => 1,
                'image_path' => 'assets/img/product/CANON_EOS_5_MARK_IV_4.jpg',
            ],
            [
                'product_id' => 1,
                'image_path' => 'assets/img/product/CANON_EOS_5_MARK_IV_5.jpg',
            ],
            // Product 2
            [
                'product_id' => 2,
                'image_path' => 'assets/img/product/CANON_EOS_77D_1.jpg',
            ],
            [
                'product_id' => 2,
                'image_path' => 'assets/img/product/CANON_EOS_77D_2.jpg',
            ],
            [
                'product_id' => 2,
                'image_path' => 'assets/img/product/CANON_EOS_77D_3.jpg',
            ],
            [
                'product_id' => 2,
                'image_path' => 'assets/img/product/CANON_EOS_77D_4.jpg',
            ],
            // Product 3
            [
                'product_id' => 3,
                'image_path' => 'assets/img/product/CANON_EOS_90D_1.jpg',
            ],
            [
                'product_id' => 3,
                'image_path' => 'assets/img/product/CANON_EOS_90D_2.jpg',
            ],
            [
                'product_id' => 3,
                'image_path' => 'assets/img/product/CANON_EOS_90D_3.jpg',
            ],
            [
                'product_id' => 3,
                'image_path' => 'assets/img/product/CANON_EOS_90D_4.jpg',
            ],
            [
                'product_id' => 3,
                'image_path' => 'assets/img/product/CANON_EOS_90D_5.jpg',
            ],
            // Product 4
            [
                'product_id' => 4,
                'image_path' => 'assets/img/product/CANON_EOS_4000D_1.jpg',
            ],
            [
                'product_id' => 4,
                'image_path' => 'assets/img/product/CANON_EOS_4000D_2.jpg',
            ],
            [
                'product_id' => 4,
                'image_path' => 'assets/img/product/CANON_EOS_4000D_3.jpg',
            ],
            [
                'product_id' => 4,
                'image_path' => 'assets/img/product/CANON_EOS_4000D_4.jpg',
            ],
            // Product 5
            [
                'product_id' => 5,
                'image_path' => 'assets/img/product/NIKON_D500_1.png',
            ],
            [
                'product_id' => 5,
                'image_path' => 'assets/img/product/NIKON_D500_2.png',
            ],
            [
                'product_id' => 5,
                'image_path' => 'assets/img/product/NIKON_D500_3.png.jpg',
            ],
            [
                'product_id' => 5,
                'image_path' => 'assets/img/product/NIKON_D500_4.png',
            ],
            // Product 6
            [
                'product_id' => 6,
                'image_path' => 'assets/img/product/NIKON_D750_1.png',
            ],
            [
                'product_id' => 6,
                'image_path' => 'assets/img/product/NIKON_D750_2.png',
            ],
            [
                'product_id' => 6,
                'image_path' => 'assets/img/product/NIKON_D750_3.png',
            ],
            [
                'product_id' => 6,
                'image_path' => 'assets/img/product/NIKON_D750_4.png',
            ],
            [
                'product_id' => 6,
                'image_path' => 'assets/img/product/NIKON_D750_5.png',
            ],
            // Product 7
            [
                'product_id' => 7,
                'image_path' => 'assets/img/product/NIKON_D850_1.png',
            ],
            [
                'product_id' => 7,
                'image_path' => 'assets/img/product/NIKON_D850_2.png',
            ],
            [
                'product_id' => 7,
                'image_path' => 'assets/img/product/NIKON_D850_3.png',
            ],
            [
                'product_id' => 7,
                'image_path' => 'assets/img/product/NIKON_D850_4.png',
            ],
            [
                'product_id' => 7,
                'image_path' => 'assets/img/product/NIKON_D850_5.png',
            ],
            [
                'product_id' => 7,
                'image_path' => 'assets/img/product/NIKON_D850_6.png',
            ],
            [
                'product_id' => 7,
                'image_path' => 'assets/img/product/NIKON_D850_7.png',
            ],
            // Product 8
            [
                'product_id' => 8,
                'image_path' => 'assets/img/product/NIKON_D7500_1.png',
            ],
            [
                'product_id' => 8,
                'image_path' => 'assets/img/product/NIKON_D7500_2.png',
            ],
            [
                'product_id' => 8,
                'image_path' => 'assets/img/product/NIKON_D7500_3.png',
            ],
            [
                'product_id' => 8,
                'image_path' => 'assets/img/product/NIKON_D7500_4.png',
            ],
            [
                'product_id' => 8,
                'image_path' => 'assets/img/product/NIKON_D7500_5.png',
            ],
            [
                'product_id' => 8,
                'image_path' => 'assets/img/product/NIKON_D7500_6.png',
            ],
            [
                'product_id' => 8,
                'image_path' => 'assets/img/product/NIKON_D7500_7.png',
            ],
            // Product 9
            [
                'product_id' => 9,
                'image_path' => 'assets/img/product/PENTAX_K1_MARK_II_1.jpg',
            ],
            [
                'product_id' => 9,
                'image_path' => 'assets/img/product/PENTAX_K1_MARK_II_2.jpg',
            ],
            [
                'product_id' => 9,
                'image_path' => 'assets/img/product/PENTAX_K1_MARK_II_3.jpg',
            ],
            [
                'product_id' => 9,
                'image_path' => 'assets/img/product/PENTAX_K1_MARK_II_4.jpg',
            ],
            [
                'product_id' => 9,
                'image_path' => 'assets/img/product/PENTAX_K1_MARK_II_5.jpg',
            ],
            [
                'product_id' => 9,
                'image_path' => 'assets/img/product/PENTAX_K1_MARK_II_6.jpg',
            ],
            [
                'product_id' => 9,
                'image_path' => 'assets/img/product/PENTAX_K1_MARK_II_7.jpg',
            ],
            // Product 10
            [
                'product_id' => 10,
                'image_path' => 'assets/img/product/IRIX_11MM_1.jpg',
            ],
            [
                'product_id' => 10,
                'image_path' => 'assets/img/product/IRIX_11MM_2.jpg',
            ],
            [
                'product_id' => 10,
                'image_path' => 'assets/img/product/IRIX_11MM_3.jpg',
            ],
            [
                'product_id' => 10,
                'image_path' => 'assets/img/product/IRIX_11MM_4.jpg',
            ],
            // Product 11
            [
                'product_id' => 11,
                'image_path' => 'assets/img/product/IRIX_15MM_1.jpg',
            ],
            [
                'product_id' => 11,
                'image_path' => 'assets/img/product/IRIX_15MM_2.jpg',
            ],
            [
                'product_id' => 11,
                'image_path' => 'assets/img/product/IRIX_15MM_3.jpg',
            ],
            [
                'product_id' => 11,
                'image_path' => 'assets/img/product/IRIX_15MM_4.jpg',
            ],
            [
                'product_id' => 11,
                'image_path' => 'assets/img/product/IRIX_15MM_5.jpg',
            ],
            // Product 12
            [
                'product_id' => 12,
                'image_path' => 'assets/img/product/IRIX_45MM_1.jpg',
            ],
            [
                'product_id' => 12,
                'image_path' => 'assets/img/product/IRIX_45MM_2.jpg',
            ],
            [
                'product_id' => 12,
                'image_path' => 'assets/img/product/IRIX_45MM_3.jpg',
            ],
            [
                'product_id' => 12,
                'image_path' => 'assets/img/product/IRIX_45MM_4.jpg',
            ],
            [
                'product_id' => 12,
                'image_path' => 'assets/img/product/IRIX_45MM_5.jpg',
            ],
            // Product 13
            [
                'product_id' => 13,
                'image_path' => 'assets/img/product/IRIX_45MM_GFX_1.jpg',
            ],
            [
                'product_id' => 13,
                'image_path' => 'assets/img/product/IRIX_45MM_GFX_2.jpg',
            ],
            [
                'product_id' => 13,
                'image_path' => 'assets/img/product/IRIX_45MM_GFX_3.jpg',
            ],
            [
                'product_id' => 13,
                'image_path' => 'assets/img/product/IRIX_45MM_GFX_4.jpg',
            ],
            // Product 14
            [
                'product_id' => 14,
                'image_path' => 'assets/img/product/IRIX_150MM_1.jpg',
            ],
            [
                'product_id' => 14,
                'image_path' => 'assets/img/product/IRIX_150MM_2.jpg',
            ],
            [
                'product_id' => 14,
                'image_path' => 'assets/img/product/IRIX_150MM_3.jpg',
            ],
            [
                'product_id' => 14,
                'image_path' => 'assets/img/product/IRIX_150MM_4.jpg',
            ],
                        [
                'product_id' => 14,
                'image_path' => 'assets/img/product/IRIX_150MM_5.jpg',
            ],
            [
                'product_id' => 14,
                'image_path' => 'assets/img/product/IRIX_150MM_6.jpg',
            ],
            [
                'product_id' => 14,
                'image_path' => 'assets/img/product/IRIX_150MM_7.jpg',
            ],
            [
                'product_id' => 14,
                'image_path' => 'assets/img/product/IRIX_150MM_8.jpg',
            ],
            [
                'product_id' => 14,
                'image_path' => 'assets/img/product/IRIX_150MM_9.jpg',
            ],
                        [
                'product_id' => 14,
                'image_path' => 'assets/img/product/IRIX_150MM_10.jpg',
            ],
            [
                'product_id' => 14,
                'image_path' => 'assets/img/product/IRIX_150MM_11.jpg',
            ],
        ];

        foreach ($product_images as $image) {
            ProductImage::create($image);
        }
    }
}
