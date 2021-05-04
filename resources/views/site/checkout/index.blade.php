@extends('layouts.master')

@section('title', 'Checkout')

@section('content')
    <section class="container px-5 h-screen flex items-center justify-center">
        <div class="py-12 lg:py-24">
            <div class="max-w-md mx-auto bg-white shadow-lg md:max-w-xl">
                <form class="md:flex" action="" method="POST">
                    <div class="w-full p-4 px-5 py-5">
                        <div class="flex flex-row">
                            <h2 class="text-3xl font-semibold">Quasar &nbsp;</h2>
                            <h3 class="text-3xl text-primary-dark font-semibold">Optic</h3>
                        </div>
                        <div class="flex flex-row pt-2 text-xs pt-6 pb-5">
                            <span class="font-bold">Information</span>
                            <span class="text-gray-400 ml-1">Shopping</span>
                            <span class="text-gray-400 ml-1">Payment</span>
                        </div>
                        <span>Customer Information</span>
                        <div class="relative pb-5">
                            <input type="email" name="mail"
                                class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                                placeholder="E-mail" aria-label="email">
                        </div>
                        <span>Shipping Address</span>
                        <div class="grid md:grid-cols-2 md:gap-2">
                            <input type="text" name="first_name"
                                class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                                placeholder="First name*" aria-label="first name">
                            <input type="text" name="last_name"
                                class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                                placeholder="Last name*" aria-label="last name">
                        </div>
                        <input type="text" name="address"
                            class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                            placeholder="Address*" aria-label="address">
                        <input type="text" name="address_extra"
                            class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                            placeholder="Apartment, suite, etc. (optional)" aria-label="address complement">
                        <div class="grid md:grid-cols-3 md:gap-2">
                            <input type="text" name="zipcode"
                                class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                                placeholder="Zipcode*" aria-label="zipcode">
                            <input type="text" name="city"
                                class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                                placeholder="City*" aria-label="city">
                            <input type="text" name="state"
                                class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                                placeholder="State*" aria-label="state">
                        </div>
                        <input type="text" name="country"
                            class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                            placeholder="Country*" aria-label="country">
                        <input type="text" name="phone"
                            class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                            placeholder="Phone Number*" aria-label="phone">
                        <div class="flex justify-between items-center pt-2">
                            <a href="{{ route('cart.index') }}">
                                <button type="button" class="h-12 w-24 text-primary-dark text-xs font-medium">
                                    Return to cart
                                </button>
                            </a>
                            <button type="button" class="btn-dark text-sm">
                                Continue to Shipping
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
