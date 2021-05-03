@extends('layouts.master')
@section('title', 'User Profile')

@section('content')
    <section class="px-5 container py-12 min-h-screen lg:py-24 lg:min-h-0">
        <div>
            <h1 class="font-bold text-3xl md:text-4xl lg:text-6xl">My Profile</h1>
            <div class="mt-8 flex items-center space-x-4">
                <img class="w-16 h-16 rounded-full" src="" alt="" id="profileImage">
                <div>
                    <p class="font-semibold">{{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}</p>
                    <p class="text-neutral-light">{{ $user->email }}</p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-4 gap-6 py-12 lg:flex items-center space-x-4" role="navigation">
            <div class="flex items-center justify-between">
                <button class="flex-grow-1 block text-left" id="tabLinks" data-content="orders">
                    <h4 class="text-lg font-semibold">My Orders</h4>
                    <p class="text-neutral-light">Lorem ipsum dolor sit amet</p>
                </button>
                <svg
                    xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:hidden" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
            <div class="flex items-center justify-between">
                <button class="flex-grow-1 block text-left" id="tabLinks" data-content="address">
                    <h4 class="text-lg font-semibold">Shipping Address</h4>
                    <p class="text-neutral-light">Register your address</p>
                </button>
                <svg
                    xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:hidden" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
            <div class="flex items-center justify-between">
                <button class="flex-grow-1 block text-left" id="tabLinks" data-content="payment">
                    <h4 class="text-lg font-semibold">Payments Method</h4>
                    <p class="text-neutral-light">...VISA</p>
                </button>
                <svg
                    xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:hidden" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
            <div class="flex items-center justify-between">
                <button class="flex-grow-1 block text-left" id="tabLinks" data-content="settings">
                    <h4 class="text-lg font-semibold">Settings</h4>
                    <p class="text-neutral-light">Change password</p>
                </button>
                <svg
                    xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:hidden" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
        </div>
    </section>
    <section class="tabcontent hidden px-5 container py-4 lg:py-8" id="orders">
        <h4 class="text-3xl">Orders</h4>
    </section>
    <section class="tabcontent hidden px-5 container py-4 lg:py-8" id="payment">
        <h4 class="text-3xl">Payment</h4>
    </section>
    <section class="tabcontent hidden px-5 container py-4 lg:py-8" id="address">
        <h4 class="text-3xl">Address</h4>
    </section>
    <section class="tabcontent hidden px-5 container py-4 lg:py-8" id="settings">
        <h4 class="text-3xl">Settings</h4>
    </section>
@endsection

@push('javascript')
    <script defer>
        const fetchProfilePicture = async () => {
            const url = `https://randomuser.me/api/`

            const res = await fetch(url)
            const data = await res.json()

            const context = data.results[0].picture.medium
            const profileImage = document.querySelector('#profileImage')
            profileImage.src = context;
        }

        fetchProfilePicture()

        const tabLinks = document.querySelectorAll('#tablinks')

        tabLinks.forEach(link => link.addEventListener('click', (e) => {
            const tabcontent = document.querySelectorAll('.tabcontent')
            const currentTabcontent = e.currentTarget.dataset.content

            tabcontent.forEach(tab => tab.classList.add('hidden'))

            const activeTab = document.querySelector(`#${currentTabcontent}`)
            activeTab.classList.remove('hidden')
        }))
    </script>
@endpush
