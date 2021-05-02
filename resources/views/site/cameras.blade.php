@extends('layouts.master')

@section('title', 'Cameras')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                            <p class="mb-2 font-medium text-lg">$ {{ number_format($camera->price) }}</p>
                            <p class="mb-2 truncate">
                                {{ $camera->description }}
                            </p>
                            <a class="btn-dark mt-2" id="orderNow" data-id="{{ $camera->id }}">
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
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true"
         id="modalCheckout">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Product added to cart
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Now you can either continue shopping or proceed to checkout.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 sm:p-6 sm:flex sm:flex sm:space-x-4 sm:ml-4">
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
                </div>
            </div>
        </div>
    </div>
@endsection
@push('javascript')
    <script defer>
        const orderNow = document.querySelectorAll("#orderNow");
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Modal
        const modalCheckout = document.querySelector('#modalCheckout');

        // Btn
        const btnContinue = document.querySelector('#btnContinue');
        const btnCheckout = document.querySelector('#btnCheckout');

        orderNow.forEach(btn => btn.addEventListener('click', dispatchOrder));

        async function dispatchOrder(e) {
            e.preventDefault();
            const product_id = e.target.dataset.id;
            modalCheckout.classList.remove('hidden');

            const res = await fetch("{{ action('App\Http\Controllers\Site\CartController@store') }}", {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                    credentials: 'same-origin',
                },
                body: JSON.stringify({
                    id: product_id,
                    quantity: 1,
                })
            });

            btnContinue.addEventListener('click', dispatchContinue);
            btnCheckout.addEventListener('click', dispatchCheckout);
        }

        function dispatchContinue() {
            modalCheckout.classList.add('hidden');
            location.reload();
        }

        function dispatchCheckout() {
            modalCheckout.classList.add('hidden');
            location = "cart";
        }
    </script>
@endpush
