@extends('layouts.master')
@section('title', 'Quasar Optic - User Orders')

@section('content')
    <section class="px-5 container pt-6 min-h-screen">
        <x-user-profile-header></x-user-profile-header>
        @if ($orders->count() >= 1)
            <div class="py-6">
                <ul class="flex flex-wrap gap-8">
                    @foreach ($orders as $order)
                        <li>
                            <div class="max-w-xl shadow-lg p-8 my-4">
                                <div>
                                    <h4 class="text-lg mb-4 font-semibold">Order N° {{ $order->order_number }}</h4>
                                </div>
                                <div class="space-y-2">
                                    <p class="flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span class="block">
                                            {{ $order->address }} - {{ $order->zipcode }} - {{ $order->city }} -
                                            {{ $order->country }}
                                        </span>
                                    </p>
                                    <p class="flex items-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="block">
                                            {{ $order->created_at }}
                                        </span>
                                    </p>
                                </div>
                                <div class="my-4" id="items">
                                    <h4 class="font-semibold text-lg mb-4">Items</h4>
                                    <ul class="space-y-2">
                                        @foreach ($order->items as $item)
                                            <li>
                                                {{ $item->product->name }} x {{ $item->quantity }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div>
                                    <span class="text-primary-dark font-semibold text-lg">Total :</span>
                                    <span>$ {{ number_format($order->grand_total, 2) }}</span>
                                </div>
                                <div>
                                    <span class="text-primary-dark font-semibold text-lg">Status :</span>
                                    @if($order->status === "completed")
                                    <span class="text-success-dark">{{ $order->status }}</span>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
    </section>
@else
    <section class="container px-5 min-h-screen">
        <h2 class="text-5xl text-primary-dark">No Orders</h2>
        <div class="py-8">
            <h3 class="text-2xl mb-4">Start Shopping</h3>
            <nav class="space-x-4" role="navigation">
                <a class="text-primary-dark" href="{{ route('cameras') }}">Cameras</a>
                <a class="text-primary-dark" href="{{ route('lenses') }}">Lenses</a>
            </nav>
        </div>
    </section>
    @endif

@endsection
