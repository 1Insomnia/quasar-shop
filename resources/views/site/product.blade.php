@extends('layouts.master')

@section('title', 'Product')

@section('content')
    <section class="text-neutral min-h-screen" id="product">
        <div class="container px-5 py-6 md:py-12 lg:py-24">
            <article class="swiper-container overflow-x-hidden mb-10" style="max-height: 500px">
                <div class="swiper-wrapper">
                    @forelse($product_images->productImages as $product_image)
                        <div class="swiper-slide">
                            <img class="w-full h-full object-contain p-8" src="{{ asset($product_image->image_path) }}"
                                alt="">
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <img class="w-full h-full object-contain p-8" src="{{ asset($product->image_path) }}" alt="">
                        </div>
                    @endforelse
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev" id="swiper-btn"></div>
                <div class="swiper-button-next" id="swiper-btn"></div>
            </article>
            <!-- Product Detail -->
            <article class="lg:w-2/3 mx-auto">
                <h1 class="text-xl font-semibold md:text-3xl">{{ $product->name }}</h1>
                <h2 class="mt-2 text-neutral-light md:text-xl lg:mt-4">${{ $product->price }}</h2>
                <div>
                    <button
                        class="uppercase w-full px-4 py-4 mt-6 font-semibold text-white transition duration-500 ease-in-out transform border border-neutral-dark bg-neutral-dark hover:bg-white hover:text-neutral-dark  focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                        Add to Cart - $ {{ $product->price }}
                    </button>
                    <p class="mt-2 text-xs text-neutral-light text-center md:text-sm">Free Shipping</p>
                </div>
                <div class="mt-4 border-b border-gray-300" id="productDisplay">
                    <button
                        class="outline-none py-2 w-full font-semibold flex items-center justify-between focus:outline-none lg:py-4"
                        id="productDataBtn">
                        <h3 class="uppercase">Core Features</h3>
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul class="hidden text-neutral-light pl-5 py-2 list-disc lg:py-4">
                        {{-- Right trim the product->features string to pop the last dot --}}
                        @foreach (explode('.', rtrim(($product->features), "." )) as $row)
                        <li>{{ $row }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="mt-4 border-b border-gray-300" id="productDisplay">
                    <button
                        class="outline-none py-2 w-full font-semibold flex items-center justify-between focus:outline-none lg:py-4"
                        id="productDataBtn">
                        <h3 class="uppercase">Description</h3>
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <p class="hidden text-neutral-light py-2 lg:py-4">
                        {{ $product->description }}
                    </p>
                </div>
                <div class="mt-4 border-b border-gray-300" id="productDisplay">
                    <button
                        class="outline-none py-2 w-full font-semibold flex items-center justify-between focus:outline-none lg:py-4"
                        id="productDataBtn">
                        <h3 class="uppercase">Shipping & Returns</h3>
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <p class="hidden text-neutral-light py-2 lg:py-4">
                        Free shipping on all orders, and our 30 days, no questions asked return policy.
                    </p>
                </div>
            </article>
        </div>
    </section>
@stop
