@extends('layouts.master')

@section('title', 'Checkout')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <section class="container px-5 py-12 md:py-24 min-h-screen">
        <div class="max-w-xl p-8 shadow-lg mx-auto">
            <div>
                <div>
                    <div>
                        <p class="py-2 text-xl font-semibold uppercase">{{ $order->first_name }}
                            {{ $order->last_name }}</p>
                        <p class="font-bold text-2xl">Thank you for your order</p>
                    </div>
                    <div class="py-4">
                        <h4 class="text-primary-dark text-xl mb-2">Order Recap</h4>
                        <span class="block bg-neutral-dark" style="height: 1px;"></span>
                    </div>
                    <div class="py-4">
                        <ul class="space-y-2">
                            <h3 class="text-lg mb-2 font-semibold">Shipping Address</h3>
                            <li class="flex items-center space-x-2">
                                <span class="block font-semibold">Address :</span>
                                <span class="block">{{ $order->address }}</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <span class="block font-semibold">Zip Code :</span>
                                <span class="block">{{ $order->zipcode }}</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <span class="block font-semibold">City :</span>
                                <span class="block">{{ $order->city }}</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <span class="block font-semibold">Country :</span>
                                <span class="block">{{ $order->country }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="py-4">

                        <ul class="space-y-2">
                            <li class="flex items-center space-x-2">
                                <span class="block font-semibold">Total :</span>
                                <span class="block">$ {{ number_format($order->grand_total) }}</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <span class="block font-semibold">Number of Items :</span>
                                <span class="block">{{ $order->item_count }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <h2>Confirm - Shipping infos and Proceed to payment</h2>
                <div class="">
                    <form>
                        <input id="card-holder-name" type="text">
                        <div id="card-element"></div>
                        <button class="btn-dark-xl" id="checkout-button">
                            Process Payment
                        </button>
                    </form>
                    <form action="{{ route('checkout.delete', $order->id) }}" method="POST" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button class="btn-dark-xl" type="submit">
                            Delete Order
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('javascript')

    <script defer>
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        let stripe = Stripe(
            "pk_test_51InfIODgJ03o6hxSFyqiMIOvK74iSCr5rJJAwn50rmzL1gEpXx0I0KdColKqxstd6XLXn2NdyhWToQfkTwJp7J3D00jGLogDmG"
        );

        let checkoutButton = document.getElementById("checkout-button");

        checkoutButton.addEventListener("click", function (e) {
            e.preventDefault();
            fetch("{{ action('App\Http\Controllers\Site\CheckoutController@checkoutPayment') }}", {
                method: "POST",
                headers: {
                    'method': 'POST',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token,
                    credentials: 'same-origin',
                },
                body: JSON.stringify({
                    id: "{{ $order->order_number }}"
                })
            })
                .then(function (response) {
                    return response.json();
                })
                .then(function (session) {
                    return stripe.redirectToCheckout({
                        sessionId: session.id
                    });
                })
                .then(function (result) {
                    if (result.error) {
                        alert(result.error.message);
                    }
                })
                .catch(function (error) {
                    console.error("Error:", error);
                });
        });
    </script>
@endpush
