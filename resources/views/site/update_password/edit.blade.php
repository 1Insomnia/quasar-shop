@extends('layouts.master')
@section('title', 'Update Password')

@section('content')
    <div class="container px-5 mt-12 mb-6">
        <h1 class="font-bold text-3xl md:text-4xl lg:text-6xl">
            <a href="{{ route('user.profile.show', auth()->user()->id) }}">
                My Profile
            </a>
        </h1>
        <div class="mt-8 flex items-center space-x-4">
            <img class="w-16 h-16 rounded-full" src="{{ asset('assets/img/user.png') }}" alt="" id="profileImage">
            <div>
                <p class="font-semibold">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</p>
                <p class="text-neutral-light">{{ auth()->user()->email }}</p>
            </div>
        </div>
    </div>
    <section class="">
        <div class="container px-5 h-screen py-12">
            <form class="w-full overflow-hidden space-y-8 max-w-2xl md:px-12 md:py-8 md:shadow-xl md:space-y-12"
                  method="POST" action="{{ route('user.update_password.update', auth()->user()->id) }}">
                @method('PATCH')
                @csrf
                <div class="text-left pt-4">
                    <h2 class="text-3xl text-primary-dark">Settings</h2>
                    <h1 class="mt-2 font-medium md:mt-6">Update - Your password</h1>
                </div>
                <div>
                    <div class="outline relative border-2 focus-within:border-primary-dark">
                        <input type="password" name="current_password" placeholder=" " id="current_password"
                               class="block p-4 w-full text-lg appearance-none focus:outline-none bg-transparent @error('current_password') border border-error-default @enderror"/>
                        <label for="current_password"
                               class="absolute top-0 text-lg bg-white p-4 -z-1 duration-300 origin-0">
                            Password
                        </label>
                    </div>
                    @error('current_password')
                    <span class="p-2 mt-2 block text-sm text-error-default bg-red-100">
                                {{ $message }}*
                            </span>
                    @enderror
                </div>
                <div>
                    <div class="outline relative border-2 focus-within:border-primary-dark">
                        <input type="password" name="new_password" placeholder=" " id="new_password"
                               class="block p-4 w-full text-lg appearance-none focus:outline-none bg-transparent @error('new_password') border border-error-default @enderror"/>
                        <label for="new_password"
                               class="absolute top-0 text-lg bg-white p-4 -z-1 duration-300 origin-0">
                            New Password
                        </label>
                    </div>
                    @error('new_password')
                    <span class="p-2 mt-2 block text-sm text-error-default bg-red-100">
                                {{ $message }}*
                            </span>
                    @enderror
                </div>
                <div>
                    <div class="outline relative border-2 focus-within:border-primary-dark">
                        <input type="password" name="new_confirm_password" placeholder=" " id="new_confirm_password"
                               class="block p-4 w-full text-lg appearance-none focus:outline-none bg-transparent @error('new_confirm_password') border border-error-default @enderror"/>
                        <label for="new_confirm_password"
                               class="absolute top-0 text-lg bg-white p-4 -z-1 duration-300 origin-0">
                            Confirm New Password
                        </label>
                    </div>
                    @error('new_confirm_password')
                    <span class="p-2 mt-2 block text-sm text-error-default bg-red-100">
                                {{ $message }}*
                            </span>
                    @enderror
                </div>
                <div>
                    <div>
                        <button
                            class="uppercase w-full inline-block px-4 py-4 mt-4 font-semibold text-white transition duration-500 ease-in-out transform border border-neutral-dark bg-neutral-dark hover:bg-white hover:text-neutral-dark  focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2"
                            type="submit">
                            Update Password
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
