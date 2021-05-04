@extends('layouts.master')
@section('title', 'User Profile')
@section('content')
    <section class="px-5 container pt-6 min-h-screen lg:min-h-0">
        <div>
            <h1 class="font-bold text-3xl md:text-4xl lg:text-6xl">My Profile</h1>
            <div class="mt-8 flex items-center space-x-4">
                <img class="w-16 h-16 rounded-full" src="{{ asset('assets/img/user.png') }}" alt="" id="profileImage">
                <div>
                    <p class="font-semibold">{{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}</p>
                    <p class="text-neutral-light">{{ $user->email }}</p>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 mt-4 gap-6 py-4 lg:flex items-center lg:   space-x-4" role="navigation">
            <div class="flex items-center justify-between">
                <button class="relative flex-grow-1 inline-block text-left outline-none focus:outline-none" id="tabLinks" data-content="orders">
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
                <a class="relative flex-grow-1 inline-block text-left outline-none focus:outline-none" href="{{ route('profile.edit', auth()->user()->id) }}">
                    <h4 class="text-lg font-semibold">Personal Information</h4>
                    <p class="text-neutral-light">Register your address</p>
                </a>
                <svg
                    xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:hidden" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </div>
            <div class="flex items-center justify-between">
                <button class="relative flex-grow-1 inline-block text-left outline-none focus:outline-none" id="tabLinks" data-content="payment">
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
                <button class="relative flex-grow-1 inline-block text-left outline-none focus:outline-none" id="tabLinks" data-content="settings">
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
@endsection

@push('javascript')
    <script defer>
        const tabs = () => {
            const tabLinks = document.querySelectorAll('#tablinks')

            tabLinks.forEach(link => link.addEventListener('click', (e) => {
                const tabcontent = document.querySelectorAll('.tabcontent')
                const currentTabcontent = e.currentTarget.dataset.content

                tabcontent.forEach(tab => tab.classList.add('hidden'))

                const activeTab = document.querySelector(`#${currentTabcontent}`)
                activeTab.classList.remove('hidden')
            }))
        }

            tabs()

    </script>
@endpush
