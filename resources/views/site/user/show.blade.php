@extends('layouts.master')
@section('title', 'User Profile')
@section('content')
    <section class="px-5 container pt-6 min-h-screen">
        <div>
            <h1 class="font-bold text-3xl md:text-4xl lg:text-6xl">My Profile</h1>
            <div class="mt-8 flex items-center space-x-4">
                <img class="w-16 h-16 rounded-full" src="{{ asset('assets/img/user.png') }}" alt="" id="profileImage">
                <div>
                    <p class="font-semibold">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                    <p class="text-neutral-light">{{ auth()->user()->email }}</p>
                </div>
            </div>
            @if (session('message'))
                <div class="text-success-dark mt-4 text-lg font-semibold py-4">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <nav class="py-8 flex flex-col gap-4 md:flex-row md:flex-wrap mg:gap-8" role="navigation" aria-label="User navigation">
            <a href="{{ route('cart.index') }}">
                <div
                    class="flex flex-col items-center justify-center max-w-sm shadow-lg p-8 transform hover:scale-105 hover:text-primary-dark transition duration-300 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-12 w-12 mb-2" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <h4>Shopping Cart</h4>
                    <p> Items : {{Cart::count() }}</p>
                </div>
            </a>
            <div>
                <a href="{{ route('user.list_orders') }}">
                    <div
                        class="flex flex-col items-center justify-center max-w-sm shadow-lg p-8 transform hover:scale-105 hover:text-primary-dark transition duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-12 w-12 mb-2" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                        </svg>
                        <h4>My Orders</h4>
                        <p> Order : 3</p>
                    </div>
                </a>
            </div>
            <div>
                <a href="{{ route('user.profile.edit', auth()->user()->id) }}">
                    <div
                        class="flex flex-col items-center justify-center max-w-sm shadow-lg p-8 transform hover:scale-105 hover:text-primary-dark transition duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-12 h-12 mb-2" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        <h4>My Personal Infos</h4>
                        <p>{{ auth()->user()->first_name }}</p>
                    </div>
                </a>
            </div>
            <div>
                <a href="{{ route('user.update_password.edit', auth()->user()->id) }}">
                    <div
                        class="flex flex-col items-center justify-center max-w-sm shadow-lg p-8 transform hover:scale-105 hover:text-primary-dark transition duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-2" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <h4>Change Password</h4>
                        <p>**************</p>
                    </div>
                </a>
            </div>
        </nav>
    </section>
@endsection

@push('javascript')
@endpush
