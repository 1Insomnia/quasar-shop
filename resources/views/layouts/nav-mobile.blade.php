<!-- @Mobile Nav List -->
<div class="hidden absolute bg-white top-0 left-0 h-screen w-full flex-col
                justify-center items-center space-y-12 font-light md:space-y-16 lg:hidden lg:invisible lg:pointer-events-none"
     id="nav-list">
    <ul class="text-center text-primary-dark space-y-2 md:space-y-4" id="nav-mobile-list">
        <li>
            <a class="text-4xl text-primary-dark hover:underline md:text-6xl"
               href="{{ route('cameras') }}">
                Cameras
            </a>
        </li>
        <li>
            <a class="text-4xl text-primary-dark hover:underline md:text-6xl"
               href="{{ route('lenses') }}">
                Lenses
            </a>
        </li>
        <li>
            <a class="text-4xl text-primary-dark hover:underline md:text-6xl"
               href="{{ route('gallery') }}">
                Gallery
            </a>
        </li>
        <li>
            <a class="text-4xl text-primary-dark hover:underline md:text-6xl"
               href="{{ route('contact') }}">
                Contact
            </a>
        </li>
        @auth
            <li>
                <a class="text-4xl text-primary-dark hover:underline md:text-6xl"
                   href="{{ route('user.profile.show', auth()->user()->id) }}">
                    Account
                </a>
            </li>
        @endauth
    </ul>
    @guest
        <div class="mt-2 text-center">
            <a class="text-xl text-primary-dark py-2 px-2 underline md:text-4xl" href="{{ route('login') }}">
                Log In
            </a>
            <a class="text-xl text-primary-dark py-2 px-2 underline md:text-4xl" href="{{ route('register') }}">
                Register
            </a>
        </div>
    @endguest
    <div class="flex items-center">
        <a class="block text-primary-dark">
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-8 h-8"
                 viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
            </svg>
        </a>
        <a class="ml-3 block text-primary-dark">
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-8 h-8"
                 viewBox="0 0 24 24">
                <path
                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                </path>
            </svg>
        </a>
        <a class="ml-3 block text-primary-dark">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                 class="w-8 h-8" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
            </svg>
        </a>
        <a class="ml-3 block text-primary-dark">
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                 stroke-width="0" class="w-8 h-8" viewBox="0 0 24 24">
                <path stroke="none"
                      d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                </path>
                <circle cx="4" cy="4" r="2" stroke="none"></circle>
            </svg>
        </a>
    </div>
    @auth
    <div class="mt-4">
        <a class="ml-3 block text-primary-dark"
           href="{{ route('cart.index') }}">
            <svg class="block w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            <x-card-quantity></x-card-quantity>
        </a>
    </div>
    @endauth
</div>
