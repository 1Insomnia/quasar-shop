@extends('layouts.master')

@section('title', 'Checkout')

@section('content')
    <section>
        <div class="container px-5 min-h-screen py-12">
            <form class="w-full overflow-hidden space-y-8 max-w-2xl md:px-12 md:py-8 md:shadow-xl md:space-y-12 mx-auto"
                  method="POST"
                  action="{{ route('checkout.place.order') }}">
                @csrf
                <div class="text-left pt-4">
                    <h1 class="mt-2 font-medium md:mt-6">Checkout</h1>
                </div>
                <div class="flex items-center space-x-4 mt-2 py-6">
                    <button
                        class="relative text-sm inline-block text-primary-dark outline-none focus:outline-none active"
                        type="button" role="button" id="btnCustomerInfos">
                        Customer Informations
                    </button>
                    <button class="relative text-sm inline-block text-primary-dark outline-none focus:outline-none"
                            type="button" role="button" id="btnShippingInfos">
                        Shipping Address
                    </button>
                </div>
                <div class="space-y-8 py-4" id="customerInfos">
                    <div>
                        <div class="outline relative border-2 focus-within:border-primary-dark">
                            <input type="email" name="email" placeholder=" " id="email" value="{{ $user->email }}"
                                   class="block p-4 w-full appearance-none focus:outline-none bg-transparent @error('email') border border-error-default @enderror"
                            />
                            <label for="email" class="absolute top-0 bg-white p-4 -z-1 duration-300 origin-0">
                                Email
                            </label>
                        </div>
                        @error('email')
                        <span class="p-2 mt-2 block text-sm text-error-default bg-red-100">
                            {{ $message }}*
                        </span>
                        @enderror
                    </div>
                    <div>
                        <div class="outline relative border-2 focus-within:border-primary-dark">
                            <input type="text" name="first_name" placeholder=" " id="first_name" value="{{ $user->first_name }}"
                                   class="block p-4 w-full appearance-none focus:outline-none bg-transparent @error('first_name') border border-error-default @enderror"
                            />
                            <label for="first_name" class="absolute top-0 bg-white p-4 -z-1 duration-300 origin-0">
                                First Name
                            </label>
                        </div>
                        @error('first_name')
                        <span class="p-2 mt-2 block text-sm text-error-default bg-red-100">
                                    {{ $message }}*
                                </span>
                        @enderror
                    </div>
                    <div>
                        <div class="outline relative border-2 focus-within:border-primary-dark">
                            <input type="text" name="last_name" placeholder=" " id="last_name" value="{{ $user->last_name }}"
                                   class="block p-4 w-full appearance-none focus:outline-none bg-transparent @error('last_name') border border-error-default @enderror"
                            />
                            <label for="last_name" class="absolute top-0 bg-white p-4 -z-1 duration-300 origin-0">
                                Last Name
                            </label>
                        </div>
                        @error('last_name')
                        <span class="p-2 mt-2 block text-sm text-error-default bg-red-100">
                            {{ $message }}*
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="hidden space-y-8 py-4" id="shippingInfos">
                    <div>
                        <div class="outline relative border-2 focus-within:border-primary-dark">
                            <input type="text" name="address" placeholder=" " id="address" @if ($user->address) value="{{ $user->address }}" @endif
                                   class="block p-4 w-full appearance-none focus:outline-none bg-transparent @error('address') border border-error-default @enderror"
                            />
                            <label for="address" class="absolute top-0 bg-white p-4 -z-1 duration-300 origin-0">
                                Address
                            </label>
                        </div>
                        @error('address')
                        <span class="p-2 mt-2 block text-sm text-error-default bg-red-100">
                            {{ $message }}*
                        </span>
                        @enderror
                    </div>
                    <div>
                        <div class="outline relative border-2 focus-within:border-primary-dark">
                            <input type="text" name="zipcode" placeholder=" " id="zipcode" @if ($user->zipcode) value="{{ $user->zipcode }}" @endif
                                   class="block p-4 w-full appearance-none focus:outline-none bg-transparent @error('zipcode') border border-error-default @enderror"
                            />
                            <label for="zipcode" class="absolute top-0 bg-white p-4 -z-1 duration-300 origin-0">
                                Zipcode
                            </label>
                        </div>
                        @error('zipcode')
                        <span class="p-2 mt-2 block text-sm text-error-default bg-red-100">
                                    {{ $message }}*
                                </span>
                        @enderror
                    </div>
                    <div>
                        <div class="outline relative border-2 focus-within:border-primary-dark">
                            <input type="text" name="city" placeholder=" " id="city" @if ($user->city) value="{{ $user->city }}" @endif
                                   class="block p-4 w-full appearance-none focus:outline-none bg-transparent @error('city') border border-error-default @enderror"
                            />
                            <label for="city" class="absolute top-0 bg-white p-4 -z-1 duration-300 origin-0">
                                City
                            </label>
                        </div>
                        @error('city')
                        <span class="p-2 mt-2 block text-sm text-error-default bg-red-100">
                                    {{ $message }}*
                                </span>
                        @enderror
                    </div>
                    <div>
                        <div class="outline relative border-2 focus-within:border-primary-dark">
                            <input type="text" name="country" placeholder=" " id="country" @if ($user->country) value="{{ $user->country }}" @endif
                                   class="block p-4 w-full appearance-none focus:outline-none bg-transparent @error('country') border border-error-default @enderror"
                            />
                            <label for="country" class="absolute top-0 bg-white p-4 -z-1 duration-300 origin-0">
                                Country
                            </label>
                        </div>
                        @error('country')
                        <span class="p-2 mt-2 block text-sm text-error-default bg-red-100">
                                    {{ $message }}*
                                </span>
                        @enderror
                    </div>
                    <div>
                        <div class="outline relative border-2 focus-within:border-primary-dark">
                            <input type="text" name="phone" placeholder=" " id="phone" @if ($user->phone) value="{{ $user->phone }}" @endif
                                   class="block p-4 w-full appearance-none focus:outline-none bg-transparent @error('phone') border border-error-default @enderror"
                            />
                            <label for="phone" class="absolute top-0 bg-white p-4 -z-1 duration-300 origin-0">
                                Phone
                            </label>
                        </div>
                        @error('phone')
                        <span class="p-2 mt-2 block text-sm text-error-default bg-red-100">
                            {{ $message }}*
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="py-4">
                    <h3 class="font-semibold text-lg mb-2">Order Total</h3>
                    $ {{ number_format(\Cart::total(), 2) }}
                </div>
                <div>
                    <div>
                        <button
                            class="uppercase w-full inline-block px-4 py-4 mt-8 font-semibold text-white transition duration-500 ease-in-out transform border border-neutral-dark bg-neutral-dark hover:bg-white hover:text-neutral-dark  focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2"
                            type="submit">
                            Place Order
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@push('javascript')
    <script defer>
        const customerInfos = document.querySelector('#customerInfos')
        const shippingInfos = document.querySelector('#shippingInfos')

        const btnShippingInfos = document.querySelector('#btnShippingInfos')
        const btnCustomerInfos = document.querySelector('#btnCustomerInfos')

        btnCustomerInfos.addEventListener('click', (e) => {
            e.preventDefault()
            e.currentTarget.classList.toggle('active')
            customerInfos.classList.remove('hidden')
            shippingInfos.classList.add('hidden')
            btnShippingInfos.classList.remove('active')
        })

        btnShippingInfos.addEventListener('click', (e) => {
            e.preventDefault();
            e.currentTarget.classList.toggle('active');
            shippingInfos.classList.remove('hidden');
            customerInfos.classList.add('hidden');
            btnCustomerInfos.classList.remove('active');
        })

    </script>
@endpush
