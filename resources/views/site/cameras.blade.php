@extends('layouts.master')
@section('title', 'Quasar Optic - Cameras')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <section>
        <div class="container px-5 py-12 flex flex-col items-center md:flex-row lg:py-24">
            <div
                class="mb-12 pl-8 flex flex-col items-center text-center md:items-start md:text-left md:mb-0 md:w-1/2 lg:flex-grow">
                <h1 class="font-bold text-3xl md:text-4xl lg:text-6xl">
                    SLR <br>
                    Cameras
                </h1>
                <p class="mt-4 text-sm text-neutral-light lg:text-base">
                    All our cameras are compatible with our lenses. Whatever the brand is!
                </p>
            </div>
            <div class="md:w-1/2 lg:max-w-xl lg:w-full">
                <img class="object-cover object-center" alt="hero" src="{{ asset('assets/img/cameras/hero.png') }}">
            </div>
        </div>
    </section>
    <section id="products_cameras">
        <div class="container px-5 py-12 md:py-24 md:grid md:grid-cols-2 md:gap-4 lg:grid-cols-3">
            @foreach ($cameras as $camera)
                <article class="p-8 transform transition duration-500 ease-in-out hover:scale-105 hover:shadow-xl"
                    id="cameraCard">
                    <img alt="" class="mb-4" src="{{ asset($camera->image_path) }}">
                    <div>
                        <h3 class="text-xl font-semibold mb-2">
                            {{ $camera->name }}
                        </h3>
                        <div class="text-neutral-medium">
                            <p class="mb-2 font-medium text-lg">$ {{ $camera->getFormatedPrice() }}
                            </p>
                            <p class="mb-2 truncate">
                                {{ $camera->description }}
                            </p>
                            @guest
                                @if ($camera->stock !== 0)
                                    <a class="btn-dark mt-2" id="orderNow" data-id="0">
                                        Add to Cart
                                    </a>
                                @else
                                    <span class="py-1 text-sm block text-error-default">
                                        Out of stock
                                    </span>
                                @endif
                            @endguest
                            @auth
                                @if ($camera->stock !== 0)
                                    <a class="btn-dark mt-2" id="orderNow" data-id="{{ $camera->id }}">
                                        Add to Cart
                                    </a>
                                @else
                                    <span class="py-1 text-sm block text-error-default">
                                        Out of stock
                                    </span>
                                @endif
                            @endauth
                            <a class="btn-dark mt-2" href="{{ route('products.show', $camera->id) }}">
                                Learn More
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach
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
        // CSRF protection
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        // Modal Window
        const modalCheckout = document.querySelector('#modalCheckout');
        // Buttons elements
        // Add to cart button
        const orderNow = document.querySelectorAll("#orderNow");
        const btnContinue = document.querySelector('#btnContinue');
        const btnCheckout = document.querySelector('#btnCheckout');
        const btnClose = document.querySelectorAll('#btnClose');

        // Loop over each close and order buttons and listen for click events
        btnClose.forEach(btn => btn.addEventListener('click', dispatchClose));
        orderNow.forEach(btn => btn.addEventListener('click', dispatchOrder));

        async function dispatchOrder(e) {
            e.preventDefault();
            // Get the product id from data-id
            const product_id = e.target.dataset.id;
            // Show the modal by removing hidden class
            modalCheckout.classList.remove('hidden');
            if (product_id === "0") return;

            // Fetch the url pointing to CartController@store method
            const res = await fetch("{{ action('App\Http\Controllers\Site\CartController@store') }}", {
                // Set method to POST
                method: 'POST',
                // Add correct headers to avoid rejection
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    // Add protection token and set credentials to same origin
                    'X-CSRF-TOKEN': token,
                    credentials: 'same-origin',
                },
                // Payload
                body: JSON.stringify({
                    id: product_id,
                    quantity: 1,
                })
            });
            // Handle continue shopping case
            btnContinue.addEventListener('click', dispatchContinue);
            // Handle continue Order Now case
            btnCheckout.addEventListener('click', dispatchCheckout);
        }

        // Handle continue shopping case
        function dispatchContinue() {
            // Close Modal
            modalCheckout.classList.add('hidden');
            // Reload page to show the updated Cart
            window.location.reload();
        }

        // Handle continue Order Now case
        function dispatchCheckout() {
            // Close Modal
            modalCheckout.classList.add('hidden');
            // Redirect user to his shopping Cart
            window.location = "{{ route('cart.index') }}";
        }

        // Handle Modal Close when user click on the close icon
        function dispatchClose() {
            modalCheckout.classList.add('hidden');
        }

    </script>
@endpush
