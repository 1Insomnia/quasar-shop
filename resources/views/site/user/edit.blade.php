@extends('layouts.master')
@section('title', 'User - Personnal Information')

@section('content')
    <section>
        <div class="container px-5 h-screen">
            <div class="py-12 lg:py-24">
                <form class="w-full overflow-hidden max-w-2xl md:px-12 md:py-8 md:shadow-xl mx-auto lg:mx-0" method="POST"
                      action="{{ route('user.profile.update', auth()->user()->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="text-left pt-4">
                        <h2 class="text-3xl text-primary-dark">Personal Informations</h2>
                        <h1 class="mt-2 font-medium md:mt-6">Edit - Your Informations</h1>
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
                                <input type="email" name="email" placeholder=" " id="email"
                                       class="block p-4 w-full appearance-none focus:outline-none bg-transparent @error('email') border border-error-default @enderror"
                                       value="{{ $user->email }}"/>
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
                                <input type="text" name="first_name" placeholder=" " id="first_name"
                                       class="block p-4 w-full appearance-none focus:outline-none bg-transparent @error('first_name') border border-error-default @enderror"
                                       value="{{ $user->first_name }}"/>
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
                                <input type="text" name="last_name" placeholder=" " id="last_name"
                                       class="block p-4 w-full appearance-none focus:outline-none bg-transparent @error('last_name') border border-error-default @enderror"
                                       value="{{ $user->last_name }}"/>
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
                                <input type="text" name="address" placeholder=" " id="address"
                                       class="block p-4 w-full appearance-none focus:outline-none bg-transparent @error('address') border border-error-default @enderror"
                                       value="{{ $user->address }}"/>
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
                                <input type="text" name="zipcode" placeholder=" " id="zipcode"
                                       class="block p-4 w-full appearance-none focus:outline-none bg-transparent @error('zipcode') border border-error-default @enderror"
                                       value="{{ $user->zipcode }}"/>
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
                                <input type="text" name="city" placeholder=" " id="city"
                                       class="block p-4 w-full appearance-none focus:outline-none bg-transparent @error('city') border border-error-default @enderror"
                                       value="{{ $user->city }}"/>
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
                                <input type="text" name="country" placeholder=" " id="country"
                                       class="block p-4 w-full appearance-none focus:outline-none bg-transparent @error('country') border border-error-default @enderror"
                                       value="{{ $user->country }}"/>
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
                                <input type="text" name="phone" placeholder=" " id="phone"
                                       class="block p-4 w-full appearance-none focus:outline-none bg-transparent @error('phone') border border-error-default @enderror"
                                       value="{{ $user->phone }}"/>
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
                    <div>
                        <div>
                            <button
                                class="uppercase w-full inline-block px-4 py-4 mt-8 font-semibold text-white transition duration-500 ease-in-out transform border border-neutral-dark bg-neutral-dark hover:bg-white hover:text-neutral-dark  focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2"
                                type="submit">
                                Update Infos
                            </button>
                        </div>
                    </div>
                </form>
            </div>
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
