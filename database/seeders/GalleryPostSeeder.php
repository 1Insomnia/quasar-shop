<?php

namespace Database\Seeders;

use App\Models\GalleryPost;
use Illuminate\Database\Seeder;

class GalleryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gallery_posts = [
            [
                'product_id' => 1,
                'title' => 'Waves',
                'description' => "The image shows the central region of the California nebula. It captures the uncontrollable and vast energy of nature in a form that resembles the huge waves of a storm in the ocean. The RGB channels are used the create the colours of the stars, and all of the nebulosity are synthetised from the hydrogen-alpha and the SII channels. The colour assignment of the narrowband channels is done in a way to create an image close to true colour, but preserving the fine details and the depth provided by the narrowband filters",
                'location' => 'Hungary',
                'author' => 'Adeline Robertson',
                'image_path' => 'assets/img/gallery/1.jpg'
            ],
            [
                'product_id' => '4',
                'title' => 'The Lady In Green',
                'description' => "The photographer had heard a lot of stories about the ‘lady in green’. Although he has had the chance to photograph the northern lights many times, he had never seen the green lady before. On a journey to Norway, she unexpectedly appeared with her magical green clothes, making the whole sky burn with green, blue and pink hues",
                'location' => 'Norway',
                'author' => 'Ramon Ringler',
                'image_path' => 'assets/img/gallery/2.jpg',
            ],
            [
                'product_id' => '3',
                'title' => 'Observe the Heart of the Galaxy',
                'description' => "This image depicts the photographer climbing the radio telescope and Mingantu solar radio telescope array. First the photographer tested and moved his camera so that the M8 and M20 nebulae would appear right next to the telescope. After taking the foreground image, he moved his camera a little bit but still pointing at the same location in the sky, and captured the background with an equatorial mount",
                'location' => 'Norway',
                'author' => 'Tian Li',
                'image_path' => 'assets/img/gallery/3.jpg',
            ],
            [
                'product_id' => '5',
                'title' => 'Andromeda Galaxy at Arm’s Length?',
                'description' => "Have you ever dreamed of touching a galaxy? This version of the Andromeda galaxy seems to be at arm’s length among clouds of stars. Unfortunately, this is just an illusion, as the galaxy is still 2m light years away. To obtain the tilt-shift effect, the photographer 3D printed a part to hold the camera at an angle at the focus of the telescope. The blur created by the defocus at the edges of the sensor gives this illusion of closeness to Andromeda",
                'location' => 'France',
                'author' => 'Nicolas Lefaudeux',
                'image_path' => 'assets/img/gallery/4.jpg',
            ],
            [
                'product_id' => '1',
                'title' => 'NGC 3628 with 300,000 Light Year Long Tail',
                'description' => "NGC 3628 is a popular galaxy target for both astrophotographers and visual observers, with its distinctive dust lane. Studies by professional astronomers have shown that the evolution of some galaxies are the product of a series of minor merges with smaller dwarf galaxies. This image is an epic undertaking of five years of exposures taken with three telescopes, although the majority of the exposure was in 2019. The goal of this mosaic is to show the tidal tail, measuring 300,000 light years in length",
                'location' => 'US',
                'author' => 'Mark Hason',
                'image_path' => 'assets/img/gallery/5.jpg',
            ],
            [
                'product_id' => '1',
                'title' => 'Azure Vapor Tracers',
                'description' => "At the top of fjords in Arctic Norway, the photographer was met with an unknown sky. Was it aliens? Was it the supernatural? He captured a series of photos to record the night and didn’t know until the next day that the colours were actually created by the auroral zone upwelling rocket experiment from Andøya Space Centre, which dispersed gas tracers to probe winds in Earth’s upper atmosphere",
                'location' => 'Norway',
                'author' => 'Yang Sutie',
                'image_path' => 'assets/img/gallery/6.jpg',
            ],
            [
                'product_id' => '6',
                'title' => 'Lone Tree under a Scandinavian Aurora',
                'description' => "The photographer decided to explore the area around the hotel on a very crisp -35C evening in Finnish Lapland. When he found this tree, he decided to wait for the misty conditions to change and could not believe his luck when the sky cleared and the aurora came out in the perfect spot. Archer spent about an hour photographing it before his camera started to lock up because of the harsh conditions, but by then he was happy to call it a night",
                'location' => 'Finland',
                'author' => 'Tom Archer',
                'image_path' => 'assets/img/gallery/7.jpg',
            ]
        ];

        foreach($gallery_posts as $gallery_post) {
            GalleryPost::create($gallery_post);
        }
    }

}
