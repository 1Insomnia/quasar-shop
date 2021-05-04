<header
    class="sticky top-0 w-full {{ request()->is('gallery') ? 'bg-neutral-dark text-white' : 'bg-white shadow-lg' }} flex items-center justify-between h-16 z-50"
    id="header">
    <div class="container px-5 flex items-center justify-between">
        <div class="flex items-center">
            <a class="relative z-50 block text-primary-dark brand-logo" href="{{ route('home') }}">
                <span class="block font-bold text-2xl z-50">QO</span>
            </a>
            <nav class="ml-4">
                @include('layouts.nav-mobile')
                @include('layouts.nav-desktop')
            </nav>
        </div>
        <!-- Header Icons -->
        <div class="flex items-center justify-between space-x-4" id="header-icons">
            <div class="hidden lg:flex lg:items-center lg:space-x-2">
                @auth
                    <form action="{{ route('logout') }}" method="post" class="m-0">
                        @csrf
                        <button class="px-4 py-2 border border-transparent hover:text-primary-dark hover:border-primary-dark
                                inline-block" type="submit">
                            Logout
                        </button>
                    </form>
                @endauth
                @guest
                    <a class="inline-block relative" href="{{ route('login') }}">
                        <span class="inline-block">Log In</span>
                    </a>
                    <a class="inline-block relative" href="{{ route('register') }}">
                        <span class="inline-block">Register</span>
                    </a>
                @endguest
            </div>
            @auth
                <a class="relative hidden hover:text-primary-dark lg:flex lg:items-center lg:justify-between"
                    href="{{ route('user.profile.show', auth()->user()->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="block h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </a>
                <a class="relative hidden lg:block hover:text-primary-dark lg:flex lg:items-center lg:justify-between"
                    href="{{ route('cart.index') }}">
                    <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <x-card-quantity></x-card-quantity>
                </a>
            @endauth
            <div class="burger burger-slip ml-4" id="nav-toggle">
                <div class="burger-lines"></div>
            </div>
        </div>
    </div>
</header>
