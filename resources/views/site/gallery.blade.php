@extends('layouts.master')

@section('title', 'Gallery')

@section('content')
    <section class="bg-neutral-dark overflow-x-hidden" id="gallery">
        <div class="py-12 lg:py-24 text-white text-center flex items-center justify-center">
            <div>
                <h1 class="text-white font-bold text-3xl md:text-4xl lg:text-6xl">Gallery</h1>
                <p class="mt-4 font-thin">Photos taken by our customers</p>
            </div>
        </div>
        <div class="py-12 lg:flex lg:flex-row-reverse lg:items-center lg:px-8 lg:py-24">
            <img class="w-full object-center object-cover lg:w-4/5" src="assets/img/gallery/1.jpg" id="test">
            <div class="text-white container px-4 lg:h-full lg:w-1/5 lg:p-4 xl:p-12">
                <h3 class=" text-lg font-medium pt-4 md:text-xl md:pt-6 lg:text-2xl">The Green Lady</h3>
                <div class="text-xs mt-4 font-light pb-4 md:text-sm md:mt-6 md:pb-6 lg:text-base lg:mt-8">
                    <p class="leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus ipsam
                        architecto ab impedit, libero
                        ex.</p>
                    <h4 class="mt-2 md:mt-4 lg:mt-6">Photograph: Roger Mana</h4>
                    <h6 class="lg:mt-1">Camera: <a href="">Canon EOS R6</a></h6>
                    <ul class="flex items-center space-x-2 mt-2 text-base md:mt-4 lg:mt-6">
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-telegram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="lg:flex lg:flex-row-reverse lg:items-center lg:px-8 lg:py-32">
            <img class="w-full object-center object-cover lg:w-4/5" src="assets/img/gallery/2.jpg" data-aos="fade-left"
                data-aos-duration="1000" data-aos-easing="ease-in-out-cubic" data-aos-mirror="true" data-aos-once="false"
                data-aos-delay="50">
            <div class="text-white container px-4 lg:w-1/5 lg:p-4 xl:p-12" data-aos="fade-right" data-aos-duration="1000"
                data-aos-easing="ease-in-out-cubic" data-aos-mirror="true" data-aos-once="false" data-aos-delay="50">
                <h3 class="text-lg font-medium pt-4 md:text-xl md:pt-6 lg:text-2xl">The Green Lady</h3>
                <div class="text-xs mt-4 font-light pb-4 md:text-sm md:mt-6 md:pb-6 lg:text-base lg:mt-8">
                    <p class="leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus ipsam
                        architecto ab impedit, libero
                        ex.</p>
                    <h4 class="mt-2 md:mt-4 lg:mt-6">Photograph: Roger Mana</h4>
                    <h6 class="lg:mt-1">Camera: <a href="">Canon EOS R6</a></h6>
                    <ul class="flex items-center space-x-2 mt-2 text-base md:mt-4 lg:mt-6">
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-telegram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="lg:flex lg:flex-row-reverse lg:items-center lg:px-8 lg:py-32">
            <img class="w-full object-center object-cover lg:w-4/5" src="assets/img/gallery/3.jpg" data-aos="fade-left"
                data-aos-duration="1000" data-aos-easing="ease-in-out-cubic" data-aos-mirror="true" data-aos-once="false"
                data-aos-delay="50">
            <div class="text-white container px-4 lg:w-1/5 lg:p-4 xl:p-12" data-aos="fade-right" data-aos-duration="1000"
                data-aos-easing="ease-in-out-cubic" data-aos-mirror="true" data-aos-once="false" data-aos-delay="50">
                <h3 class="text-lg font-medium pt-4 md:text-xl md:pt-6 lg:text-2xl">The Green Lady</h3>
                <div class="text-xs mt-4 font-light pb-4 md:text-sm md:mt-6 md:pb-6 lg:text-base lg:mt-8">
                    <p class="leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus ipsam
                        architecto ab impedit, libero
                        ex.</p>
                    <h4 class="mt-2 md:mt-4 lg:mt-6">Photograph: Roger Mana</h4>
                    <h6 class="lg:mt-1">Camera: <a href="">Canon EOS R6</a></h6>
                    <ul class="flex items-center space-x-2 mt-2 text-base md:mt-4 lg:mt-6">
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-telegram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="lg:flex lg:flex-row-reverse lg:items-center lg:px-8 lg:py-32">
            <img class="w-full object-center object-cover lg:w-4/5" src="assets/img/gallery/4.jpg" data-aos="fade-left"
                data-aos-duration="1000" data-aos-easing="ease-in-out-cubic" data-aos-mirror="true" data-aos-once="false"
                data-aos-delay="50">
            <div class="text-white container px-4 lg:w-1/5 lg:p-4 xl:p-12" data-aos="fade-right" data-aos-duration="1000"
                data-aos-easing="ease-in-out-cubic" data-aos-mirror="true" data-aos-once="false" data-aos-delay="50">
                <h3 class="text-lg font-medium pt-4 md:text-xl md:pt-6 lg:text-2xl">The Green Lady</h3>
                <div class="text-xs mt-4 font-light pb-4 md:text-sm md:mt-6 md:pb-6 lg:text-base lg:mt-8">
                    <p class="leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus ipsam
                        architecto ab impedit, libero
                        ex.</p>
                    <h4 class="mt-2 md:mt-4 lg:mt-6">Photograph: Roger Mana</h4>
                    <h6 class="lg:mt-1">Camera: <a href="">Canon EOS R6</a></h6>
                    <ul class="flex items-center space-x-2 mt-2 text-base md:mt-4 lg:mt-6">
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-telegram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="lg:flex lg:flex-row-reverse lg:items-center lg:px-8 lg:py-32">
            <img class="w-full object-center object-cover lg:w-4/5" src="assets/img/gallery/5.jpg" data-aos="fade-left"
                data-aos-duration="1000" data-aos-easing="ease-in-out-cubic" data-aos-mirror="true" data-aos-once="false"
                data-aos-delay="50">
            <div class="text-white container px-4 lg:w-1/5 lg:p-4 xl:p-12" data-aos="fade-right" data-aos-duration="1000"
                data-aos-easing="ease-in-out-cubic" data-aos-mirror="true" data-aos-once="false" data-aos-delay="50">
                <h3 class="text-lg font-medium pt-4 md:text-xl md:pt-6 lg:text-2xl">The Green Lady</h3>
                <div class="text-xs mt-4 font-light pb-4 md:text-sm md:mt-6 md:pb-6 lg:text-base lg:mt-8">
                    <p class="leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus ipsam
                        architecto ab impedit, libero
                        ex.</p>
                    <h4 class="mt-2 md:mt-4 lg:mt-6">Photograph: Roger Mana</h4>
                    <h6 class="lg:mt-1">Camera: <a href="">Canon EOS R6</a></h6>
                    <ul class="flex items-center space-x-2 mt-2 text-base md:mt-4 lg:mt-6">
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-telegram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="lg:flex lg:flex-row-reverse lg:items-center lg:px-8 lg:py-32">
            <img class="w-full object-center object-cover lg:w-4/5" src="assets/img/gallery/6.jpg" data-aos="fade-left"
                data-aos-duration="1000" data-aos-easing="ease-in-out-cubic" data-aos-mirror="true" data-aos-once="false"
                data-aos-delay="50">
            <div class="text-white container px-4 lg:w-1/5 lg:p-4 xl:p-12" data-aos="fade-right" data-aos-duration="1000"
                data-aos-easing="ease-in-out-cubic" data-aos-mirror="true" data-aos-once="false" data-aos-delay="50">
                <h3 class="text-lg font-medium pt-4 md:text-xl md:pt-6 lg:text-2xl">The Green Lady</h3>
                <div class="text-xs mt-4 font-light pb-4 md:text-sm md:mt-6 md:pb-6 lg:text-base lg:mt-8">
                    <p class="leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus ipsam
                        architecto ab impedit, libero
                        ex.</p>
                    <h4 class="mt-2 md:mt-4 lg:mt-6">Photograph: Roger Mana</h4>
                    <h6 class="lg:mt-1">Camera: <a href="">Canon EOS R6</a></h6>
                    <ul class="flex items-center space-x-2 mt-2 text-base md:mt-4 lg:mt-6">
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-telegram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="lg:flex lg:flex-row-reverse lg:items-center lg:px-8 lg:py-32">
            <img class="w-full object-center object-cover lg:w-4/5" src="assets/img/gallery/7.jpg')" data-aos="fade-left"
                data-aos-duration="1000" data-aos-easing="ease-in-out-cubic" data-aos-mirror="true" data-aos-once="false"
                data-aos-delay="50">
            <div class="text-white container px-4 lg:w-1/5 lg:p-4 xl:p-12" data-aos="fade-right" data-aos-duration="1000"
                data-aos-easing="ease-in-out-cubic" data-aos-mirror="true" data-aos-once="false" data-aos-delay="50">
                <h3 class="text-lg font-medium pt-4 md:text-xl md:pt-6 lg:text-2xl">The Green Lady</h3>
                <div class="text-xs mt-4 font-light pb-4 md:text-sm md:mt-6 md:pb-6 lg:text-base lg:mt-8">
                    <p class="leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatibus ipsam
                        architecto ab impedit, libero
                        ex.</p>
                    <h4 class="mt-2 md:mt-4 lg:mt-6">Photograph: Roger Mana</h4>
                    <h6 class="lg:mt-1">Camera: <a href="">Canon EOS R6</a></h6>
                    <ul class="flex items-center space-x-2 mt-2 text-base md:mt-4 lg:mt-6">
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-telegram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@stop
