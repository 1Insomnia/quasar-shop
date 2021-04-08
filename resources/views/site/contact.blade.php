@extends('layouts.master')

@section('title', 'Contact')

@section('content')
    <section class="h-screen-full text-gray-600 body-font relative">
        <div class="absolute inset-0 bg-gray-300">
            <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" title="map" scrolling="no"
                src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=NewYork+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed"
                style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
        </div>
        <div class="container px-5 py-12 mx-auto flex md:py-24">
            <div
                class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
                <div class="px-6">
                    <h2 class="uppercase font-medium text-neutral-dark tracking-widest text-xl">ADDRESS</h2>
                    <p class="mt-2">946 Moonlight Drive, New York City</p>
                </div>
                <div class="px-6 mt-4">
                    <h2 class="font-medium text-neutral-dark tracking-widest text-xl">EMAIL</h2>
                    <a href="mailto:quasar.optic@domain.com"
                        class="mt-2 text-primary-dark leading-relaxed">quasar.optic@domain.com</a>
                    <h2 class="uppercase font-medium text-neutral-dark tracking-widest text-xl mt-4">PHONE</h2>
                    <p class="leading-relaxed mt-2">123-456-7890</p>
                </div>
                <div class="px-6 mt-4">
                    <h2 class="uppercase font-medium text-neutral-dark tracking-widest text-xl">Buisness Hours</h2>
                    <p class="mt-2 leading-relaxed">8am-6pm Mon-Friday</p>
                </div>
            </div>
    </section>
@stop
