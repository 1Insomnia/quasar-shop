@extends('layouts.master')
@section('title', 'Update Password')

@section('content')
    <section class="min-h-screen text-neutral-dark">
        <div class="container px-5 h-full">
            <div class="h-full">
                <form class="h-full w-full overflow-hidden space-y-8 max-w-2xl md:px-12 md:py-8 md:shadow-xl md:space-y-12"
                    method="POST" action="{{ route('user.update_password.update', auth()->user()->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="">
                        <h1 class="text-primary-dark mt-2 text-xl font-medium md:mt-4">
                            Update Password
                        </h1>
                    </div>
                    <div>
                        <div class="outline relative border-2 focus-within:border-primary-dark">
                            <input type="password" name="current_password" placeholder=" " id="current_password"
                                class="block p-4 w-full text-lg appearance-none focus:outline-none bg-transparent @error('current_password') border border-error-default @enderror" />
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
                                class="block p-4 w-full text-lg appearance-none focus:outline-none bg-transparent @error('new_password') border border-error-default @enderror" />
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
                                class="block p-4 w-full text-lg appearance-none focus:outline-none bg-transparent @error('new_confirm_password') border border-error-default @enderror" />
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
        </div>
    </section>
@endsection
