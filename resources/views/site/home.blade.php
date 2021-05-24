@extends('layouts.master')
@section('title', 'Quasar Optic - Home')

@section('content')
    <!-- Hero Section -->
    <section>
        <div
            class="relative h-screen-3/4 bg-hero-pattern bg-cover bg-center flex flex-col items-center justify-center bg-fixed">
            <div class="text-purple-50 text-center" data-aos="fade-down" data-aos-duration="1000"
                data-aos-easing="ease-in-out-cubic" data-aos-mirror="true" data-aos-once="false" data-aos-delay="50"
                id="hero-home">
                <h1 class="font-alt text-5xl py-4 md:text-6xl md:font-light lg:text-8xl">
                    Quasar Optic
                </h1>
                <p class="text-sm mt-4 lg:mt-8 md:text-xl xl:text-3xl">
                    <a href="{{ route('cameras') }}" class="underline hover:opacity-80">Cameras</a>
                    and
                    <a href="{{ route('lenses') }}" class="underline hover:opacity-80">Lenses</a>
                    for Astrophotographers
                </p>
                <p class="text-sm mt-2 lg:mt-4 md:text-xl">
                    With our equipement light years away will never feel so close to
                    home
                </p>
            </div>
        </div>
    </section>
    <!-- Cameras Section -->
    <section id="home-cameras">
        <div class="container px-5 py-24 lg:flex lg:items-center lg:justify-between lg:py-32">
            <img class="lg:w-1/2" src="{{ asset('assets/img/home/camera.jpg') }}" alt="camera picture" />
            <div class="flex flex-col items-center justify-center lg:w-1/2">
                <h2 class="mt-8 font-bold text-3xl md:text-4xl lg:text-6xl">
                    Cameras
                </h2>
                <p class="mt-4 text-center leading-relaxed md:mt-8">
                    Long shutter speed, high ISO, wide aperture, manual mode, large
                    sensor and dynamic range.
                </p>
                <div class="mt-2 flex items-center space-x-6 md:mt-6">
                    <img class="w-16" src="{{ asset('assets/img/brands/Nikon.png') }}" alt="Nikon Brand Logo" />
                    <img class="w-16" src="{{ asset('assets/img/brands/Canon.png') }}" alt="Canon Brand Logo" />
                </div>
                <a class="mt-6 btn-dark-xl" href="{{ route('cameras') }}">Our Selection</a>
            </div>
        </div>
    </section>
    <!-- Lenses Section -->
    <section id="home-lenses">
        <div class="container px-5 py-24 lg:flex lg:flex-row-reverse lg:items-center lg:justify-between lg:py-32">
            <img class="lg:w-1/2" src="{{ asset('assets/img/home/lens.png') }}" alt="lense picture" />
            <div class="flex flex-col items-center justify-center lg:w-1/2">
                <h2 class="mt-8 font-bold text-3xl md:text-4xl lg:text-6xl">
                    Lenses
                </h2>
                <p class="mt-4 text-center leading-relaxed md:mt-8">
                    Large aperture, wide focal length, high sharpness, low coma, low
                    vignetting.
                </p>
                <div class="mt-2 flex items-center space-x-6 md:mt-6">
                    <img class="w-16" style="filter: invert(1);" src="{{ asset('assets/img/brands/Irix.png') }}"
                        alt="Irix Brand Logo" />
                </div>
                <a class="mt-6 btn-dark-xl" href="{{ route('lenses') }}">Our Selection</a>
            </div>
        </div>
    </section>
    <!-- Introduction -->
    <section id="home-introduction">
        <div
            class="container px-5 py-24 flex flex-col-reverse md:flex md:flex-row md:items-center md:justify-between lg:py-32">
            <img class="w-full h-auto md:w-1/2" src="{{ asset('assets/img/home/night-sky.jpg') }}"
                alt="person in night sky background" />
            <div class="md:p-8 xl:p-16">
                <h3 class="text-primary-dark text-2xl md:text-3xl lg:text-4xl">
                    Perfect for night photography
                </h3>
                <p class="mt-4 max-w-80-ch leading-relaxed lg:mt-8">
                    Night photography is not only interesting but also highly
                    rewarding – it allows you to easily create eye-catching images,
                    if you have the right camera and lens. That's why at quasar
                    optic we have a small selection of very high quality photography
                    equipement and all of our material is cross-compatible.
                </p>
                <p class="mt-4 mb-4 md:mb-0">
                    With Quasar Optic<span class="text-primary-dark">
                        The night is yours!</span>
                </p>
            </div>
        </div>
    </section>
    <div class="fixed bottom-4 left-4 py-4 bg-white flex rounded-md shadow-xl border border-primary-dark"
        style="width: 100%; max-width: 600px;" id="cookiePolicy">
        <svg class="p-4 block flex-grow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 97.93 97.93" style="width: 175px;">
            <g data-name="Layer 2">
                <g data-name="Layer 1">
                    <path
                        d="M44 23.76a2.47 2.47 0 10.91 3.37 2.47 2.47 0 00-.91-3.37zM25.9 40.32a2.47 2.47 0 000 4.93 2.47 2.47 0 100-4.93z" />
                    <circle cx="32.08" cy="65.86" r="2.47" />
                    <path
                        d="M56.38 69.91a2.47 2.47 0 101.14 1.49 2.47 2.47 0 00-1.14-1.49zM72 52.68a2.47 2.47 0 00-2.38 1.83 2.44 2.44 0 00.25 1.87 2.47 2.47 0 004.52-.59 2.44 2.44 0 00-.25-1.87A2.47 2.47 0 0072 52.68z" />
                    <path
                        d="M89.51 52.86A14 14 0 0181 47.2a14.09 14.09 0 01-20-11.52 14.09 14.09 0 01-11.51-19.95 14 14 0 01-5.66-8.55 44 44 0 00-21.09 6.15 44.26 44.26 0 0048.72 73.75 44.24 44.24 0 0018.05-34.22zm-61.23-9.44a2.47 2.47 0 01-2.38 1.83 2.47 2.47 0 112.38-1.83zm3.8 24.9a2.47 2.47 0 112.47-2.47 2.47 2.47 0 01-2.47 2.47zm12.84-41.19a2.47 2.47 0 11-.92-3.37 2.47 2.47 0 01.92 3.37zm12.36 46.14a2.47 2.47 0 11-.9-3.36 2.47 2.47 0 01.9 3.36zm17.14-17.48a2.47 2.47 0 11-.25-1.87 2.45 2.45 0 01.25 1.87z"
                        fill="#139af1" />
                    <path
                        d="M97.93 48.52v-.2A2.35 2.35 0 0095.7 46a9.37 9.37 0 01-8-5.45 2.35 2.35 0 00-3.49-.93 9.51 9.51 0 01-5.44 1.72 9.4 9.4 0 01-9.38-10.24 2.35 2.35 0 00-2.55-2.55h-.85a9.39 9.39 0 01-7.68-14.81 2.35 2.35 0 00-.93-3.49 9.37 9.37 0 01-5.45-8A2.35 2.35 0 0049.61 0H49a49 49 0 1049 49c-.07-.18-.07-.33-.07-.48zM71.46 87.08a44.26 44.26 0 01-48.72-73.75 44 44 0 0124.79-8.61 14 14 0 005.66 8.55 14.09 14.09 0 0011.52 19.95 14.09 14.09 0 0019.95 11.53 14 14 0 008.56 5.66 44.3 44.3 0 01-21.76 36.67z" />
                </g>
            </g>
        </svg>
        <div class="p-4">
            <p class="mb-4">
                <span>We use cookies to personalize your experience. By continuing to visit this website you agree to our
                    use of
                    cookies.
            </p>
            <div>
                <button class="mr-4 py-2 px-4 bg-primary-dark text-white rounded-xl outline-none focus:outline-none"
                    id="btnAccept">
                    Got It
                </button>
                <a href={{ route('privacy.index') }} id="linkAccept">Read our policy</a></span>
            </div>
        </div>
    </div>
@endsection
@push('javascript')
    <script defer>
        // Content
        const cookiePolicy = document.querySelector('#cookiePolicy')
        const btnAccept = document.querySelector('#btnAccept')
        const linkAccept = document.querySelector('#linkAccept')

        sessionStorage.getItem('cookieconsent') ? cookiePolicy.classList.add('hidden') : cookiePolicy.classList.remove(
            'hidden')

        btnAccept.addEventListener('click', accept)
        linkAccept.addEventListener('click', accept)

        function accept(e) {
            sessionStorage.setItem('cookieconsent', true)
            cookiePolicy.classList.add('hidden')
        }

    </script>
@endpush
