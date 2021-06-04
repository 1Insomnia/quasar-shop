@extends('layouts.master')
@section('title', 'Quasar Optic - Product Details')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <section class="text-neutral min-h-screen" id="product">
        <div class="container px-5 py-6 md:py-12 lg:py-24">
            <article class="swiper-container overflow-x-hidden mb-10 h-screen-1/2"
                style="min-height: 300px; max-height: 500px;">
                <div class="swiper-wrapper">
                    @forelse($product->images as $product_image)
                        <div class="swiper-slide">
                            <img class="object-contain object-center w-full h-full p-8"
                                src="{{ asset($product_image->image_path) }}" alt="{{ $product->name }} photo">
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <img class="object-contain object-center p-8 w-full h-full"
                                src="{{ asset($product->image_path) }}" alt="">
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
                <h2 class="mt-2 text-neutral-light md:text-2xl lg:mt-4">${{ $product->price }}</h2>
                <div>
                    <button id="btnAddToCart"
                        class="uppercase w-full px-4 py-4 mt-6 font-semibold text-white transition duration-500 ease-in-out transform border border-neutral-dark bg-neutral-dark hover:bg-white hover:text-neutral-dark  focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2"
                        data-id="{{ $product->id }}">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="{2}" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <p class="hidden">
                        {{ json_decode($product->features, true) }}
                    </p>
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
    <div class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true"
        id="modalCheckout">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl">
                <div class="relative sm:p-8 md:p-12 ">
                    <button id="btnClose">
                        <svg class="absolute top-2 right-2 h-6 w-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="py-4">
                        @auth
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Product added to cart
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Now you can either continue shopping or proceed to checkout.
                                </p>
                            </div>
                        @endauth
                        @guest
                            <div>
                                You must be logged in to order products.
                                <a class="text-primary-dark" href="{{ route('login') }}">Login</a>
                            </div>
                        @endguest
                    </div>
                    <div class="">
                        @auth
                            <button type="button"
                                class="text-sm bg-neutral-dark hover:text-opacity-90 text-white py-3 px-5 uppercase"
                                id="btnContinue">
                                Continue Shopping
                            </button>
                            <button type="button"
                                class="text-sm bg-neutral-dark hover:text-opacity-90 text-white py-3 px-5 uppercase"
                                id="btnCheckout">
                                Order Now
                            </button>
                        @endauth
                        @guest
                            <button type="button"
                                class="text-sm bg-neutral-dark hover:text-opacity-90 text-white py-3 px-5 uppercase"
                                id="btnContinue">
                                Continue Shopping
                            </button>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('javascript')
    <script defer>
        // Toggle Menu For Description etc.
        const productDataBtn = document.querySelectorAll("#productDataBtn");

        productDataBtn.forEach((btn) => {
            btn.addEventListener("click", (e) => {
                const currentProductDisplay = e.currentTarget.parentNode;
                const productData = currentProductDisplay.childNodes[3];
                const currentProductDataBtn = currentProductDisplay.childNodes[1];
                const currentSvg = currentProductDataBtn.childNodes[3];

                currentSvg.classList.toggle("rotate-inverse-z");
                productData.classList.toggle("hidden");
            });
        });

        // Btn Add to Cart
        const btnAddToCart = document.querySelector("#btnAddToCart");
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Modal
        const modalCheckout = document.querySelector('#modalCheckout');

        // Btn
        const btnContinue = document.querySelector('#btnContinue');
        const btnCheckout = document.querySelector('#btnCheckout');

        btnAddToCart.addEventListener('click', dispatchOrder);
        btnClose.addEventListener('click', dispatchClose);

        async function dispatchOrder(e) {
            e.preventDefault();
            const product_id = e.target.dataset.id;
            modalCheckout.classList.remove('hidden');
            if (product_id === "0") return;

            const res = await fetch("{{ action('App\Http\Controllers\Site\CartController@store') }}", {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                    credentials: 'same-origin',
                },
                body: JSON.stringify({
                    id: parseInt(product_id),
                    quantity: 1,
                })
            });

            btnContinue.addEventListener('click', dispatchContinue);
            btnCheckout.addEventListener('click', dispatchCheckout);
        }

        function dispatchContinue() {
            modalCheckout.classList.add('hidden');
            window.location.reload();
        }

        function dispatchCheckout() {
            modalCheckout.classList.add('hidden');
            window.location = "{{ route('cart.index') }}";
        }

        function dispatchClose() {
            modalCheckout.classList.add('hidden');
        }

    </script>
@endpush
