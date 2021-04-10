<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $products = [
            [
                'category_id' => 1,
                'brand_id' => 1,
                'name' => 'CANON EOS 5D MARK IV',
                'price' => 3000,
                'image_path' => 'assets/img/cameras/CANON_EOS_5D_MARK_IV.jpg',
                'stock' => 100,
                'description' => 'The EOS R5 builds off of the powerful legacy of Canon’s full frame cameras offering next generation refinements in image quality, performance and reliability. It’s an ideal choice for a large range of photographic and cinematographic environments from weddings, portraits, sports, journalism, landscape, cinematography and more.

                Canon’s all-new 45 Megapixel full-frame sensor is at the heart of the EOS R5’s superb image quality, which also leads the way for impressive 8K DCI cinematic movie capture with theability to extract 35.4 Megapixel still images. Focus and speed are paramount in the EOS R5, providing impressive continuous capture at speeds of up to 20 frames-per-second and with Dual Pixel CMOS AF II capability, to track split second movements of eventhe most elusive of subjects. With 1,053 Automatic AF zones, it is easier than ever to photograph people with the use of Eye, Face and Head Detection AF, or intuitively track the whole body, face or eye of cats, dogs, or birds with Animal Detection*2 AF. The 5-axis in-body image stabilization can effectively compensate for camera shake with approximately 8 stops of stabilization* with use of certain non-stabilized, and optically image stabilized lenses. Connectivity like 5GHz and 2.4GHz Wi-Fi® and Bluetooth®, is also included.',
                'status' => 1
            ],
            [
                'category_id' => 1,
                'brand_id' => 1,
                'name' => 'CANON EOS 77D',
                'price' => 1700.00,
                'image_path' => 'assets/img/cameras/CANON_EOS_77D.jpg',
                'stock' => 100,
                'description' => "The next-generation APS-C sensor delivers ultra-detailed photos, even in thebrightest and most shaded areas. The world's fastest Live View autofocus * ensures razor-sharp images,even when subjects are moving quickly.",
                'status' => 1
            ],
            [
                'category_id' => 1,
                'brand_id' => 1,
                'name' => 'CANON EOS 90D',
                'price' => 1400.00,
                'image_path' => 'assets/img/cameras/CANON_EOS_90D.jpg',
                'stock' => 100,
                'description' => "32.5 Megapixel APS-C CMOS sensor. Dual Pixel autofocus (live view/video) 45-point cross-type AF (through the viewfinder) 220k-pixel metering sensor w/face detection.",
                'status' => 1
            ],
            [
                'category_id' => 1,
                'brand_id' => 1,
                'name' => 'CANON EOS 4000D',
                'price' => 1700,
                'image_path' => 'assets/img/cameras/CANON_EOS_4000D.jpg',
                'stock' => 100,
                'description' => "The Canon EOS 4000D is the most budget-friendly Canon DSLR and features an 18MP APS-C-size sensor. It uses Canon's DIGIC 4+ image processor which offers an ISO range of 100-6400, expandable to 12800, as well as 3 fps burst shooting. ... The 4000d uses a 2.7-inch, 230,000-dot LCD or, of course, an optical viewfinde.",
                'status' => 1
            ],
            [
                'category_id' => 1,
                'brand_id' => 2,
                'name' => 'NIKON D500',
                'price' => 4000.00,
                'image_path' => 'assets/img/cameras/NIKON_D500.jpg',
                'stock' => 100,
                'description' => "Meet the new DX flagship, the Nikon D500. At first glance, it may seem unimposing—but contained within a streamlined camera body is a veritable powerhouse of processing power and technological advances. The D500 is ready to go wherever your passion leads you, capturing everything with stunning clarity, speed and resolution. From busy, low-light cityscapes to thrilling wildlife scenes and fast action shots, the D500 is the ideal companion to your wanderlust. Marvel at the clarity of its cinematic 4K UHD video. Be amazed at its ruggedness and versatility. And, once you’ve captured your gorgeous photos, admire them on the D500’s high resolution tilt touchscreen display and share them via the built-in SnapBridge (Wi-Fi® + Bluetooth) capabilities. No matter what you shoot, you can be sure that the D500 will be up to the task, time and time again.",
                'status' => 1
            ],
            [
                'category_id' => 1,
                'brand_id' => 2,
                'name' => 'NIKON D750',
                'price' => 3200.00,
                'image_path' => 'assets/img/cameras/NIKON_D750.jpg',
                'stock' => 100,
                'description' => "For those who find inspiration everywhere, who switch between stills and video without missing a beat, who want the look only a full-frame DSLR can achieve and who love sharing their shots, the D750 is the tool to unleash your artistry. With features inspired by D4S and D810, the D750 brings dazzling image quality, cinematic video capabilities and pro-inspired handling in a nimble design with a tilting Vari-angle LCD and built-in Wi-Fi connectivity. Enthusiasts upgrading from a DX-format DSLR will marvel at the D750's full-frame performance. Pros seeking a primary or secondary camera for fast-paced shoots will appreciate the D750's familiar handling and speed. And filmmakers looking for a compact DSLR to bring a production to life or to capture B-Roll will find the D750 a perfect fit. The D750 is a thrilling centerpiece of an exceptional imaging system.",
                'status' => 1
            ],
            [
                'category_id' => 1,
                'brand_id' => 2,
                'name' => 'NIKON D850',
                'price' => 2000.00,
                'image_path' => 'assets/img/cameras/NIKON_D850.jpg',
                'stock' => 100,
                'description' => "When Nikon introduced the D800 and D800E, it set a new benchmark for DSLR image quality and super high resolution photography that approached medium format. Now, five years later, Nikon proudly introduces the next evolution in high resolution DSLRs, a camera that allows photographers to capture fast action in 45.7 megapixels of brilliant resolution. With remarkable advancements across the board—sensor design, autofocus, dynamic range, sensitivity, Speedlight control, battery life, shutter and mirror drive mechanisms, Silent Photography in Live-View mode, focus shift capability and more—this is quite possibly the most impressive, well-rounded DSLR yet",
                'status' => 1
            ],
            [
                'category_id' => 1,
                'brand_id' => 2,
                'name' => 'NIKON D7500',
                'price' => 1200.00,
                'image_path' => 'assets/img/cameras/NIKON_D7500.jpg',
                'stock' => 100,
                'description' => "Born from a desire for flagship performance and innovation in a more compact and streamlined connected camera, the D7500 delivers the game-changing resolution, ISO range, image processing and energy efficiency of the award-winning D500 in an enthusiast-level DSLR. Simply put, the D7500 is built to outperform any camera in its class with top-tier image quality, blazing speed, flawless autofocus, 4K Ultra HD video and pro-grade creative tools—all in a comfortable, rugged design. This is a camera for the new generation of creators.",
                'status' => 1
            ],
            [
                'category_id' => 1,
                'brand_id' => 3,
                'name' => 'PENTAX K1 MARK II',
                'price' => 4000.00,
                'image_path' => 'assets/img/cameras/PENTAX_K70.jpg',
                'stock' => 100,
                'description' => "The Pentax K-1 Mark II updates Ricoh's full-frame DSLR with a new 'accelerator unit' preprocessor, which improves high ISO noise performance, boosting the top sensitivity to 819,200. As before, it features a 36.4MP full-frame CMOS sensor without an AA filter and is stabilized using Ricoh's SRII Shake Reduction system. This five-axis shake reduction system is capable of reducing camera shake with a compensation range of up to five shutter steps. SRII also allows the PENTAX K-1 to incorporate other features such as Pixel Shift Resolution, which effectively eliminates moiré without the need for an anti-aliasing filter, increasing sharpness and overall image quality. A new Dynamic Pixel Shift mode allows for handheld high-res photos by using the small movements of your hands to capture the four images that are combined.",
                'status' => 1
            ],
            [
                'category_id' => 2,
                'brand_id' => 4,
                'name' => 'IRIX 11MM',
                'price' => 555.00,
                'image_path' => 'assets/img/lenses/IRIX_11.jpg',
                'stock' => 100,
                'description' => "Whether you’re a professional photographer looking for a lens for your next shoot, or an amature looking for to expand your lens set, this one’s for you.

            The Irix 11mm f/4.0 is an ultra-wide-angle lens created for your full frame (35mm) camera, and comes in Nikon F, Canon EF, and Pentax K mounts. It opens you to an entirely new world of photography– thanks to a 126 degree field of view, you’re able to capture incredibly captivating images, and excellent optics ensure sharp, detailed images.",
                'status' => 1
            ],
            [
                'category_id' => 2,
                'brand_id' => 4,
                'name' => 'IRIX 15MM',
                'price' => 455.00,
                'image_path' => 'assets/img/lenses/IRIX_15.jpg',
                'stock' => 100,
                'description' => "It doesn’t matter if you are a professional photographer looking for a lens for your next job, or an amateur looking to expand your focal range – the Irix 15mm f/2.4 is a right choice for every landscape photographer!

            The Irix 15mm f/2.4 lens is an ultra wide-angle lens created for your full frame (35mm) camera, available in Nikon F, Canon EF, and Pentax K mounts.

            This lens will allow you to open up to a completely new type of photography – thanks to the 110-degree field of view you will be able to capture eye-catching images, and the excellent optical properties will make the image sharp and full of details.",
                'status' => 1
            ],
            [
                'category_id' => 2,
                'brand_id' => 4,
                'name' => 'IRIX 45MM',
                'price' => 735.00,
                'image_path' => 'assets/img/lenses/IRIX_45.jpg',
                'stock' => 100,
                'description' => "It doesn’t matter if you are a professional photographer looking for a lens for your next job, or an amateur looking to expand your lens set.

            The Irix 45mm f/1.4 lens is a fast f/1.4 lens with a classic 50 degree field of view, created for your full frame (35mm) camera. It’s available in Nikon F, Canon EF, and Pentax K mounts.

            The combination of fast aperture and a classic focal length makes this lens extremely practical. You can use it both for portrait photos (on which you can blur the background effectively), or during a trip where you can take breathtaking landscapes creating extremely sharp images.",
                'status' => 1
            ],
            [
                'category_id' => 2,
                'brand_id' => 4,
                'name' => 'IRIX 45MM',
                'price' => 1835.00,
                'image_path' => 'assets/img/lenses/IRIX_45_GFX.jpg',
                'stock' => 100,
                'description' => "The Irix 45mm f / 1.4 GFX is a professional lens designed for FujiFilm GFX cameras.

            It has a high-quality construction, based on the knowledge of Irix Lens engineers gained during the design and production of full-frame lenses. The equivalent focal length of 45mm for the FujiFilm GFX sensor is ~ 36mm, which combined with the very high resolution of the lens, makes it possible to capture every subject of photography.

            The combination of fast aperture and length makes this lens extremely practical. You can use it both for photos on which you can blur the background special effectively.",
                'status' => 1
            ],
            [
                'category_id' => 2,
                'brand_id' => 4,
                'name' => 'IRIX 150MM',
                'price' => 1835.00,
                'image_path' => 'assets/img/lenses/IRIX_150.jpg',
                'stock' => 100,
                'description' => "Whether you’re a professional photographer looking for a lens for your next shoot, or an amateur looking to expand your focal range.

            The Irix 150mm f / 2.8 Macro 1:1 lens is a Macro lens created for your full frame (35mm) camera, and is available in Nikon F, Canon EF, and Pentax K mounts.

            The lens allows you to take macro photos with a 1:1 magnification ratio. When you use a camera with an APS-C sensor, due to the crop factor, the magnification ratio will increase to 1,5:1.",
                'status' => 1
            ]
        ];

        foreach($products as $product){
            Product::create($product);
        }
    }
}