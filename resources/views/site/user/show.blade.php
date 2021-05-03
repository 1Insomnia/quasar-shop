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
        <div class="grid grid-cols-1 mt-4 gap-6 py-4 lg:flex items-center space-x-4" role="navigation">
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
                <button class="relative flex-grow-1 inline-block text-left outline-none focus:outline-none" id="tabLinks" data-content="address">
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
    <section class="tabcontent hidden px-5 container py-4 lg:py-8" id="orders">
        <h4 class="text-3xl">Orders</h4>
    </section>
    <section class="tabcontent hidden px-5 container py-4 lg:py-8" id="payment">
        <h4 class="text-3xl">Payment</h4>
        <article>
        </article>
    </section>
    <section class="tabcontent hidden px-5 container py-4 lg:py-8" id="address">
        <h4 class="text-3xl">Address</h4>
        <article>
            <div class="max-w-md mx-auto bg-white shadow-lg md:max-w-xl mx-2">
                <form class="md:flex" action="" method="POST">
                    <div class="w-full p-4 px-5 py-5">
                        <div class="flex flex-row">
                            <h2 class="text-3xl font-semibold">Quasar &nbsp;</h2>
                            <h3 class="text-3xl text-primary-dark font-semibold">Optic</h3>
                        </div>
                        <div class="flex flex-row pt-2 text-xs pt-6 pb-5">
                            <span class="font-bold">Information</span>
                            <span class="text-gray-400 ml-1">Shopping</span>
                            <span class="text-gray-400 ml-1">Payment</span>
                        </div>
                        <span>Customer Information</span>
                        <div class="relative pb-5">
                            <input type="email" name="mail"
                                   class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                                   placeholder="E-mail"
                                   aria-label="email">
                        </div>
                        <span>Shipping Address</span>
                        <div class="grid md:grid-cols-2 md:gap-2">
                            <input type="text" name="first_name"
                                   class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                                   placeholder="First name*"
                                   aria-label="first name">
                            <input type="text" name="last_name"
                                   class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                                   placeholder="Last name*"
                                   aria-label="last name">
                        </div>
                        <input type="text" name="address"
                               class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                               placeholder="Address*"
                               aria-label="address">
                        <input type="text" name="address_extra"
                               class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                               placeholder="Apartment, suite, etc. (optional)"
                               aria-label="address complement">
                        <div class="grid md:grid-cols-3 md:gap-2">
                            <input type="text" name="zipcode"
                                   class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                                   placeholder="Zipcode*"
                                   aria-label="zipcode">
                            <input type="text" name="city"
                                   class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                                   placeholder="City*"
                                   aria-label="city">
                            <input type="text" name="state"
                                   class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                                   placeholder="State*"
                                   aria-label="state">
                        </div>
                        <input type="text" name="country"
                               class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                               placeholder="Country*"
                               aria-label="country">
                        <input type="text" name="phone"
                               class="border h-10 w-full focus:outline-none focus:border-primary-dark px-2 mt-2 text-sm"
                               placeholder="Phone Number*"
                               aria-label="phone">
                        <button type="button" class="btn-dark text-sm">
                            Continue to Shipping
                        </button>
                    </div>
                </form>
            </div>
        </article>
    </section>
    <section class="tabcontent hidden px-5 container py-4 lg:py-8" id="settings">
        <h4 class="text-3xl">Settings</h4>
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

        fetchProfilePicture()
        tabs()

    </script>
@endpush
