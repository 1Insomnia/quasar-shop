@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <!-- Hero Section -->
    <section>
        <div
            class="relative h-screen-3/4 bg-hero-pattern bg-cover bg-center flex flex-col items-center justify-center bg-fixed">
            <div class="text-purple-50 text-center" data-aos="fade-down" data-aos-duration="1000"
                 data-aos-easing="ease-in-out-cubic" data-aos-mirror="true" data-aos-once="false" data-aos-delay="50"
                 id="hero-home">
                <h1 class="font-alt text-5xl py-4 md:text-6xl md:font-light lg:text-8xl">
                    Quasar Optic
                </h1>
                <p class="text-sm mt-4 lg:mt-8 md:text-xl xl:text-3xl">
                    <a href="{{ route('cameras') }}" class="underline hover:opacity-80">Cameras</a>
                    and
                    <a href="{{ route('lenses') }}" class="underline hover:opacity-80">Lenses</a>
                    for Astrophotographers
                </p>
                <p class="text-sm mt-2 lg:mt-4 md:text-xl">
                    With our equipement light years away will never feel so close to
                    home
                </p>
            </div>
        </div>
    </section>
    <!-- Cameras Section -->
    <section id="home-cameras">
        <div class="container px-5 py-24 lg:flex lg:items-center lg:justify-between lg:py-32">
            <img class="lg:w-1/2" src="{{ asset("assets/img/home/camera.jpg") }}" alt="camera picture"/>
            <div class="flex flex-col items-center justify-center lg:w-1/2">
                <h2 class="mt-8 font-bold text-3xl md:text-4xl lg:text-6xl">
                    Cameras
                </h2>
                <p class="mt-4 text-center leading-relaxed md:mt-8">
                    Long shutter speed, high ISO, wide aperture, manual mode, large
                    sensor and dynamic range.
                </p>
                <div class="mt-2 flex items-center space-x-6 md:mt-6">
                    <img class="w-16" src="{{ asset("assets/img/brands/Nikon.png") }}" alt="Nikon Brand Logo"/>
                    <img class="w-16" src="{{ asset("assets/img/brands/Canon.png") }}" alt="Canon Brand Logo"/>
                </div>
                <a class="mt-6 btn-dark-xl" href="{{ route('cameras') }}">Our Selection</a>
            </div>
        </div>
    </section>
    <!-- Lenses Section -->
    <section id="home-lenses">
        <div class="container px-5 py-24 lg:flex lg:flex-row-reverse lg:items-center lg:justify-between lg:py-32">
            <img class="lg:w-1/2" src="{{ asset("assets/img/home/lens.png") }}" alt="lense picture"/>
            <div class="flex flex-col items-center justify-center lg:w-1/2">
                <h2 class="mt-8 font-bold text-3xl md:text-4xl lg:text-6xl">
                    Lenses
                </h2>
                <p class="mt-4 text-center leading-relaxed md:mt-8">
                    Large aperture, wide focal length, high sharpness, low coma, low
                    vignetting.
                </p>
                <div class="mt-2 flex items-center space-x-6 md:mt-6">
                    <img class="w-16" style="filter: invert(1);" src="{{ asset("assets/img/brands/Irix.png") }}"
                         alt="Irix Brand Logo"/>
                </div>
                <a class="mt-6 btn-dark-xl" href="{{ route('lenses') }}">Our Selection</a>
            </div>
        </div>
    </section>
    <!-- Introduction -->
    <section id="home-introduction">
        <div
            class="container px-5 py-24 flex flex-col-reverse md:flex md:flex-row md:items-center md:justify-between lg:py-32">
            <img class="w-full h-auto md:w-1/2" src="{{ asset('assets/img/home/night-sky.jpg') }}"
                 alt="person in night sky background"/>
            <div class="md:p-8 xl:p-16">
                <h3 class="text-primary-dark text-2xl md:text-3xl lg:text-4xl">
                    Perfect for night photography
                </h3>
                <p class="mt-4 max-w-80-ch leading-relaxed lg:mt-8">
                    Night photography is not only interesting but also highly
                    rewarding – it allows you to easily create eye-catching images,
                    if you have the right camera and lens. That's why at quasar
                    optic we have a small selection of very high quality photography
                    equipement and all of our material is cross-compatible.
                </p>
                <p class="mt-4 mb-4 md:mb-0">
                    With Quasar Optic<span class="text-primary-dark">
                        The night is yours!</span>
                </p>
            </div>
        </div>
    </section>
@endsection
