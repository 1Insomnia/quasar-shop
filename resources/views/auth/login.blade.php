@extends('layouts.master-alt')

@section('title', 'Login')

@section('content')
    <section class="h-screen text-neutral-dark">
        <div class="container px-5 h-full">

            <div class="h-full flex items-center justify-center">
                <form class="w-full overflow-hidden space-y-8 max-w-xl md:px-12 md:py-8 md:shadow-xl md:space-y-12"
                      method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="text-center pt-4">
                        <h2 class="font-alt text-3xl text-primary-dark">Quasar Optic</h2>
                        <h1 class="mt-2 font-medium md:mt-4">Log into your account</h1>
                        @if (session('status'))
                            <h3 class="text-error-default text-xl font-semibold pt-4">
                                {{ session('status') }}
                            </h3>
                        @endif
                    </div>
                    <div>
                        <div class="outline relative border-2 focus-within:border-primary-dark">
                            <input type="email" name="email" placeholder=" " autofocus="email" autocomplete="email" id="email"
                                   value="{{ old('email') }}"
                                   class="block p-4 w-full text-lg appearance-none focus:outline-none bg-transparent
                                                                        @error('email') border border-error-default @enderror"/>
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
                        <div class="outline relative border-2 focus-within:border-primary-dark">
                            <input type="password" name="password" placeholder=" " id="password"
                                   class="block p-4 w-full text-lg appearance-none focus:outline-none bg-transparent
                                                                        @error('password') border border-error-default @enderror"/>
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
                        <div class="mt-4">
                            <label for="remember" id="remember">Remember me ?</label>
                            <input type="checkbox" name="remember" id="remember">
                        </div>
                        <div class="mt-4">
                            <label>
                                <a href="">Forgot password ?</a>
                            </label>
                        </div>
                    </div>
                    <div>
                        <button
                            class="uppercase w-full inline-block px-4 py-4 mt-4 font-semibold text-white transition duration-500 ease-in-out transform border border-neutral-dark bg-neutral-dark hover:bg-white hover:text-neutral-dark  focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2"
                            type="submit">
                            Log In
                        </button>
                    </div>
                    <div class="text-center">
                        <p class="mt-4 text-neutral-light">No Account ?</p>
                        <a class="mt-2 text-primary-dark md:mt-4" href="{{ route('register') }}">Create One</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@stop
