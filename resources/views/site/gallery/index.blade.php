@extends('layouts.master')
@section('title', 'Quasar Optic - Gallery')

@section('content')
    <section class="bg-neutral-dark overflow-x-hidden" id="gallery">
        <div class="py-12 lg:py-24 text-white text-center flex items-center justify-center">
            <div>
                <h1 class="text-white font-bold text-3xl md:text-4xl lg:text-6xl">Gallery</h1>
                <p class="mt-4 font-light">Photos taken by our customers</p>
            </div>
        </div>
        @foreach ($gallery_posts as $gallery_post)
            <article class="py-12 lg:flex lg:flex-row-reverse lg:items-center lg:px-8 lg:py-24">
                <img class="w-full object-center object-cover lg:w-2/3" src="{{ asset($gallery_post->image_path) }}"
                    id="test" alt="" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-out-cubic"
                    data-aos-mirror="true" data-aos-once="false" data-aos-delay="50">
                <div class="text-white container px-4 lg:h-full lg:w-1/3 lg:p-12" data-aos="fade-right"
                    data-aos-duration="1000" data-aos-easing="ease-in-out-cubic" data-aos-mirror="true"
                    data-aos-once="false" data-aos-delay="50">
                    <h3 class="text-xl font-medium pt-4 md:text-xl md:pt-8 lg:text-3xl">{{ $gallery_post->title }}</h3>
                    <div class="text-xs mt-4 font-light pb-4 md:text-sm md:mt-6 md:pb-6 lg:text-base lg:mt-8">
                        <p class="leading-relaxed font-light" style="max-width: 80ch;">
                            {{ $gallery_post->description }}
                        </p>
                        <div class="mt-2 md:mt-6 lg:mt-6">
                            <h4>
                                <span class="underline">Photograph</span>: {{ $gallery_post->author }}
                            </h4>
                            <h6 class="lg:mt-2"><span class="underline">Camera</span>:
                                <a href="{{ route('products.show', $gallery_post->product->id) }}">
                                    {{ $gallery_post->product->name }}
                                </a>
                            </h6>
                            <h6 class="lg:mt-2">
                                <a href=""><span class="underline">Location</span> : {{ $gallery_post->location }}</a>
                            </h6>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
    </section>
@endsection
