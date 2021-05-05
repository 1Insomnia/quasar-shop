@extends('layouts.master')

@section('title', 'Checkout')

@section('content')
    <section>
        <h1>Checkout</h1>
        <form>
            <input id="card-holder-name" type="text">
            <!-- Stripe Elements Placeholder -->
            <div id="card-element"></div>
            <button class="btn-dark-xl" id="card-button">
                Process Payment
            </button>
        </form>
    </section>
@endsection
@push('extra-javascript')
    <script src="https://js.stripe.com/v3/"></script>
@endpush
@push('javascript')
    <script>
        const stripe = Stripe('pk_test_51InfIODgJ03o6hxSFyqiMIOvK74iSCr5rJJAwn50rmzL1gEpXx0I0KdColKqxstd6XLXn2NdyhWToQfkTwJp7J3D00jGLogDmG');

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');

        cardButton.addEventListener('click', async (e) => {
            const {paymentMethod, error} = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: {name: cardHolderName.value}
                }
            );
            if (error) {
                displayError.textContent = error.message;
            } else {
                displayError.textContent = "";
            }
        });
    </script>
@endpush
