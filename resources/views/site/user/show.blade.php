@extends('layouts.master')
@section('title', 'User Profile')
@section('content')
    <section class="px-5 container pt-6 min-h-screen    ">
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
        <nav class="grid grid-cols-1 mt-8 gap-6 py-4 lg:flex items-center lg:space-x-4" role="navigation">
            <div class="flex items-center justify-between">
                <button class="relative flex-grow-1 inline-block text-left outline-none focus:outline-none">
                    <h4 class="text-lg font-semibold">My Orders</h4>
                </button>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:hidden" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
            <div class="flex items-center justify-between">
                <a class="relative flex-grow-1 inline-block text-left outline-none focus:outline-none"
                   href="{{ route('user.profile.edit', auth()->user()->id) }}">
                    <h4 class="text-lg font-semibold">Personal Information</h4>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:hidden" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
            <div class="flex items-center justify-between">
                <button class="relative flex-grow-1 inline-block text-left outline-none focus:outline-none">
                    <h4 class="text-lg font-semibold">Payments Method</h4>
                </button>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:hidden" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
            <div class="flex items-center justify-between">
                <a class="relative flex-grow-1 inline-block text-left outline-none focus:outline-none"
                   href="{{ route('user.update_password.edit', auth()->user()->id) }}">
                    <h4 class="text-lg font-semibold">Change Password</h4>
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:hidden" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
        </nav>
    </section>
@endsection

@push('javascript')
@endpush
