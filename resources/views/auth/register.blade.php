@extends('layouts.master-alt')

@section('title', 'Register')

@section('content')
    <section class="min-h-screen text-neutral-dark">
        <div class="container px-5 h-full">
            <div class="h-full md:flex md:items-center md:justify-center">
                <form class="w-full overflow-hidden space-y-8 max-w-2xl md:px-12 md:py-8 md:shadow-xl md:space-y-12"
                      method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="text-center pt-4">
                        <h2 class="font-alt text-3xl text-primary-dark">Quasar Optic</h2>
                        <h1 class="mt-2 font-medium md:mt-4 ">Create an account</h1>
                    </div>
                    <div>
                        About you
                    </div>
                    <div>
                        <div class="outline relative border-2 focus-within:border-primary-dark">
                            <input type="text" name="first_name" placeholder=" " id="first_name"
                                   class="block p-4 w-full text-lg appearance-none focus:outline-none bg-transparent @error('first_name') border border-error-default @enderror"
                                   value="{{ old('first_name') }}"/>
                            <label for="first_name"
                                   class="absolute top-0 text-lg bg-white p-4 -z-1 duration-300 origin-0">
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
                                   class="block p-4 w-full text-lg appearance-none focus:outline-none bg-transparent @error('last_name') border border-error-default @enderror"
                                   value="{{ old('last_name') }}"/>
                            <label for="last_name"
                                   class="absolute top-0 text-lg bg-white p-4 -z-1 duration-300 origin-0">
                                Last Name
                            </label>
                        </div>
                        @error('last_name')
                        <span class="p-2 mt-2 block text-sm text-error-default bg-red-100">
                                {{ $message }}*
                            </span>
                        @enderror
                    </div>
                    <div>
                        <div class="outline relative border-2 focus-within:border-primary-dark">
                            <input type="email" name="email" placeholder=" " id="email"
                                   class="block p-4 w-full text-lg appearance-none focus:outline-none bg-transparent @error('email') border border-error-default @enderror"
                                   value="{{ old('email') }}"/>
                            <label for="email" class="absolute top-0 text-lg bg-white p-4 -z-1 duration-300 origin-0">
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
                        Security
                    </div>
                    <div>
                        <div class="outline relative border-2 focus-within:border-primary-dark">
                            <input type="password" name="password" placeholder=" " id="password"
                                   class="block p-4 w-full text-lg appearance-none focus:outline-none bg-transparent @error('password') border border-error-default @enderror"/>
                            <label for="password"
                                   class="absolute top-0 text-lg bg-white p-4 -z-1 duration-300 origin-0">
                                Password
                            </label>
                        </div>
                        @error('password')
                        <span class="p-2 mt-2 block text-sm text-error-default bg-red-100">
                                {{ $message }}*
                            </span>
                        @enderror
                    </div>
                    <div>
                        <div class="outline relative border-2 focus-within:border-primary-dark">
                            <input type="password" name="password_confirmation" placeholder=" "
                                   id="password_confirmation"
                                   class="block p-4 w-full text-lg appearance-none focus:outline-none bg-transparent @error('password_confirmation') border border-error-default @enderror"/>
                            <label for="password_confirmation"
                                   class="absolute top-0 text-lg bg-white p-4 -z-1 duration-300 origin-0">
                                Confirm Password
                            </label>
                        </div>
                    </div>
                    <div>
                        <div>
                            <button
                                class="uppercase w-full inline-block px-4 py-4 mt-4 font-semibold text-white transition duration-500 ease-in-out transform border border-neutral-dark bg-neutral-dark hover:bg-white hover:text-neutral-dark  focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2"
                                type="submit">Log In
                            </button>
                        </div>
                        <div class="text-center">
                            <p class="mt-4 text-neutral-light">Already have an account ?</p>
                            <a class="mt-2 text-primary-dark md:mt-4" href='{{ route('login') }}'>Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
