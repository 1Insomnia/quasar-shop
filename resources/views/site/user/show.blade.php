@extends('layouts.master')
<style>
    .navCard {
        opacity: 0;
    }

    .navCard {
        animation: navLinkFade 0.5s ease forwards;
    }

</style>
@section('title', 'Quasar Optic - User Profile')
@section('content')
    <section class="px-5 container pt-6 min-h-screen">
        <x-user-profile-header></x-user-profile-header>
        <nav class="py-6 md:py-12 grid grid-cols-2 gap-4 mg:gap-8 lg:grid-cols-4 lg:gap-12" role="navigation"
            aria-label="User navigation">
            <div class="navCard">
                <a href="{{ route('cart.index') }}">
                    <div
                        class="flex flex-col items-center justify-center max-w-sm shadow-lg p-4 md:p-8 transform hover:scale-105 hover:text-primary-dark transition duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2 md:w-12 md:h-12 md:mb-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <h4 class="text-sm font-semibold mb-1 md:text-lg md:mb-2 lg:text-xl">Cart</h4>
                        <p class="text-sm md:text-base lg:text-lg">Items : {{ $user_cart_items }}</p>
                    </div>
                </a>
            </div>
            <div class="navCard">
                <a href="{{ route('user.list_orders') }}">
                    <div
                        class="flex flex-col items-center justify-center max-w-sm shadow-lg p-4 md:p-8 transform hover:scale-105 hover:text-primary-dark transition duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2 md:w-12 md:h-12 md:mb-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                        </svg>
                        <h4 class="text-sm font-semibold mb-1 md:text-lg md:mb-2 lg:text-xl">Orders</h4>
                        <p class="text-sm md:text-base lg:text-lg">Order : {{ $user_orders_count }}</p>
                    </div>
                </a>
            </div>
            <div class="navCard opacity-0">
                <a href="{{ route('user.profile.edit', auth()->user()->id) }}">
                    <div
                        class="flex flex-col items-center justify-center max-w-sm shadow-lg p-4 md:p-8 transform hover:scale-105 hover:text-primary-dark transition duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2 md:w-12 md:h-12 md:mb-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <h4 class="text-sm font-semibold mb-1 md:text-lg md:mb-2 lg:text-xl">Personal Infos</h4>
                        <p class="text-sm md:text-base lg:text-lg">{{ auth()->user()->first_name }}</p>
                    </div>
                </a>
            </div>
            <div class="navCard">
                <a href="{{ route('user.update_password.edit', auth()->user()->id) }}">
                    <div
                        class="flex flex-col items-center justify-center max-w-sm shadow-lg p-4 md:p-8 transform hover:scale-105 hover:text-primary-dark transition duration-300 ease-in-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2 md:w-12 md:h-12 md:mb-4" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        <h4 class="text-sm font-semibold mb-1 md:text-lg md:mb-2 lg:text-xl">Password</h4>
                        <p class="text-sm md:text-base lg:text-lg">**************</p>
                    </div>
                </a>
            </div>
            @if ($user->role === 'admin')
                <div class="navCard">
                    <a href="{{ route('admin.dashboard') }}">
                        <div
                            class="flex flex-col items-center justify-center max-w-sm shadow-lg p-4 md:p-8 transform hover:scale-105 hover:text-primary-dark transition duration-300 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mb-2 md:w-12 md:h-12 md:mb-4" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>
                            <h4 class="text-sm font-semibold mb-1 md:text-lg md:mb-2 lg:text-xl">Manage Shop</h4>
                            <p class="text-sm md:text-base lg:text-lg">Dashboard</p>
                        </div>
                    </a>
                </div>
            @endif
        </nav>
    </section>
@endsection

@push('javascript')
    <script defer>
        const navCard = document.querySelectorAll('.navCard')

        navCard.forEach(
            (link, index) =>
            (link.style.animationDelay = `${index / navCard.length + 0.2}s`)
        );

    </script>
@endpush
