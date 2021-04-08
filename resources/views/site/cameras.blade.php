@extends('layouts.master')

@section('title', 'Cameras')
@section('content')
    <section class="">
        <div class="container px-5 py-12 flex flex-col items-center md:flex-row lg:py-24">
            <div
                class="mb-12 pl-8 flex flex-col items-center text-center md:items-start md:text-left md:mb-0 md:w-1/2 lg:flex-grow">
                <h1 class="font-bold text-3xl md:text-4xl lg:text-6xl">
                    SLR <br>
                    Cameras
                </h1>
                <p class="mt-4 text-sm text-neutral-light">
                    All our cameras are compatible with our lenses. Whatever the brand is!
                </p>
            </div>
            <div class="md:w-1/2 lg:max-w-xl lg:w-full">
                <img class="object-cover object-center" alt="hero" src="{{ asset('assets/img/cameras/hero.png') }}">
            </div>
        </div>
    </section>
    <section class="" id="products_cameras">
        <div class="container px-5 py-12 md:py-24 md:grid md:grid-cols-2 md:gap-4 lg:grid-cols-3">
            @foreach ($cameras as $camera)
                <article class="p-8 transform hover:scale-105 hover:shadow-xl  transition duration-500 ease-in-out">
                    <img alt="" class="mb-4" src="{{ asset($camera->image_path) }}">
                    <div>
                        <h3 class="text-xl font-semibold mb-2">
                            {{ $camera->name }}
                        </h3>
                        <div class="text-neutral-medium">
                            <p class="mb-2 font-medium text-lg">$ {{ number_format($camera->price) }}.00</p>
                            <p class="mb-2 truncate">
                                {{ $camera->description }}
                            </p>
                            <a class="btn-dark mt-2" href="">
                                Order Now
                            </a>
                            <a class="btn-dark mt-2" href="products/{{ $camera->id }}">
                                Learn More
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@stop
