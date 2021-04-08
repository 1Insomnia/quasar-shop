<header
    class="sticky top-0 w-full {{ request()->is('gallery') ? 'bg-neutral-dark text-white' : 'bg-white shadow-lg' }} flex items-center justify-between h-16 z-50"
    id="header">
    <div class="container px-5 flex items-center justify-between">
        <div class="flex items-center">
            <a class="relative z-50 block text-primary-dark brand-logo" href="{{-- route('home') --}}">
                <span class="block font-bold text-2xl z-50">QO</span>
            </a>
            <nav class="ml-4">
                <!-- @Mobile Nav List -->
                <div class="hidden absolute text-neutral-dark bg-white top-0 left-0 h-screen w-full flex flex-col
                justify-center items-center space-y-12 font-light md:space-y-16 lg:hidden lg:invisible lg:pointer-events-none"
                    id="nav-list">
                    <ul class="text-center space-y-2 md:space-y-4">
                        <li>
                            <a class="text-xl hover:underline hover:text-primary-dark md:text-4xl"
                                {{-- href="{{ route('cameras') }}"> --}}>
                                Cameras </a>
                        </li>
                        <li>
                            <a class="text-xl hover:underline hover:text-primary-dark md:text-4xl"
                                href="{{-- route('lenses') --}}">
                                Lenses
                            </a>
                        </li>
                        <li>
                            <a class="text-xl hover:underline hover:text-primary-dark md:text-4xl"
                                href="{{-- route('gallery') --}}">
                                Gallery
                            </a>
                        </li>
                        <li>
                            <a class="text-xl hover:underline hover:text-primary-dark md:text-4xl"
                                href="{{-- route('contact') --}}">
                                Contact
                            </a>
                        </li>
                    </ul>
                    <div class="mt-2 text-center">
                        <a class="text-xl text-primary-dark py-2 px-2 underline md:text-4xl"
                            href="{{-- route('login') --}}">
                            Log In
                        </a>
                        <a class="text-xl text-primary-dark py-2 px-2 underline md:text-4xl"
                            href="{{-- route('register') --}}">
                            Register
                        </a>
                    </div>
                    <div class="flex items-center">
                        <a class="block text-primary-dark">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-8 h-8" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                            </svg>
                        </a>
                        <a class="ml-3 block text-primary-dark">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-8 h-8" viewBox="0 0 24 24">
                                <path
                                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                </path>
                            </svg>
                        </a>
                        <a class="ml-3 block text-primary-dark">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-8 h-8" viewBox="0 0 24 24">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                            </svg>
                        </a>
                        <a class="ml-3 block text-primary-dark">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="0" class="w-8 h-8" viewBox="0 0 24 24">
                                <path stroke="none"
                                    d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                                </path>
                                <circle cx="4" cy="4" r="2" stroke="none"></circle>
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- @Desktop Nav List -->
                <!-- Hover effect in custom file -->
                <ul class="hidden lg:flex lg:items-center lg:justify-between lg:space-x-4" id="nav-list-desktop">
                    <li>
                        <a class="relative block hover:text-primary-dark" href="{{-- route('cameras') --}}">
                            Cameras
                        </a>
                    </li>
                    <li>
                        <a class="relative block hover:text-primary-dark" href="{{-- route('lenses') --}}">
                            Lenses
                        </a>
                    </li>
                    <li>
                        <a class="relative block hover:text-primary-dark" href="{{-- route('gallery') --}}">
                            Gallery
                        </a>
                    </li>
                    <li>
                        <a class="relative block hover:text-primary-dark" href="{{-- route('contact') --}}">
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Header Icons -->
        <div class="flex items-center justify-between space-x-4" id="header-icons">
            <div class="hidden hover:text-primary-dark lg:flex lg:items-center lg:space-x-2">
                @auth
                    <form action="{{-- route('logout') --}}" method="post" class="m-0">
                        @csrf
                        <button class="inline-block" type="submit">
                            Logout
                        </button>
                    </form>
                @endauth
                @guest
                    <a class="inline-block" href="{{-- route('login') --}}">
                        <span class="block">Log In</span>
                    </a>
                    <a class="inline-block" href="{{-- route('register') --}}">
                        <span class="block">Register</span>
                    </a>
                @endguest
            </div>
            <a class="relative hidden lg:block hover:text-primary-dark" href="{{-- route('cart') --}}">
                <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </a>
            <div class="burger burger-slip ml-4" id="nav-toggle">
                <div class="burger-lines"></div>
            </div>
        </div>
    </div>
</header>
