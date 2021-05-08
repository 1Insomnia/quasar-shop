@extends('layouts.master')
@section('title', 'Cart')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <section class="">
        <div class="container px-5 py-12 lg:py-24">
            <div class="mb-12 pl-8">
                <h1 class="text-center font-bold text-3xl md:text-4xl lg:text-6xl">
                    Shopping Cart
                </h1>
            </div>
        </div>
    </section>
    <section class="container px-5 min-h-screen">
        <div class="flex justify-center mt-10">
            <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                <div class="flex-1">
                    <table class="w-full text-sm lg:text-base" cellspacing="0">
                        <thead>
                            <tr class="h-12 uppercase">
                                <th class="hidden md:table-cell"></th>
                                <th class="text-left">Product</th>
                                <th class="lg:text-right text-left pl-5 lg:pl-0">
                                    <span class="lg:hidden" title="Quantity">Qtd</span>
                                    <span class="hidden lg:inline">Quantity</span>
                                </th>
                                <th class="hidden text-right md:table-cell">Unit price</th>
                                <th class="text-right">Total price</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart_content as $row)
                                <tr>
                                    <td class="hidden pb-4 md:table-cell">
                                        <a href="#">
                                            <img src="{{ asset($row->options->image_path) }}" class="w-20 rounded"
                                                alt="Thumbnail">
                                        </a>
                                    </td>
                                    <td>
                                        <p class="mb-2 md:ml-4">{{ $row->name }}</p>
                                    </td>
                                    <td class="justify-center md:justify-end md:flex md:mt-8">
                                        <div class="w-20 h-10">
                                            <div class="relative flex flex-row w-full h-8">
                                                <input id="intputQty" type="number" value="{{ $row->qty }}"
                                                    aria-label="inputQt" data-id="{{ $row->rowId }}"
                                                    class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black" />
                                            </div>
                                        </div>
                                    </td>
                                    <td class="hidden text-right md:table-cell">
                                        <span class="text-sm lg:text-base font-medium">
                                            {{ $row->subtotal }}
                                        </span>
                                    </td>
                                    <td class="text-right">
                                        <span class="text-sm lg:text-base font-medium">
                                            {{ $row->total }}
                                        </span>
                                    </td>
                                    <td class="text-center align-baseline font-bold">
                                        <form method="POST" action="{{ route('cart.destroy', $row->rowId) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit">&cross;</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr class="pb-6 mt-6">
                    <div class="my-4 mt-6 -mx-2 lg:flex">
                        <div class="lg:px-2 lg:w-full">
                            <div class="p-4 bg-gray-100">
                                <h1 class="ml-2 font-bold uppercase">Order Details</h1>
                            </div>
                            <div class="p-4">
                                <p class="mb-6 italic">Shipping and additionnal costs are calculated based on values you
                                    have entered</p>
                                <div class="flex justify-between pt-4 border-b">
                                    <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                        New Subtotal
                                    </div>
                                    <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                        {{ $cart_subtotal }}
                                    </div>
                                </div>
                                <div class="flex justify-between pt-4 border-b">
                                    <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                        Total
                                    </div>
                                    <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                        {{ $cart_total }}
                                    </div>
                                </div>
                                <a href="{{ route('checkout.index') }}">
                                    <button
                                        class="flex items-center justify-center space-x-4 uppercase w-full px-4 py-4 mt-6 font-semibold text-white transition duration-500 ease-in-out transform border border-neutral-dark bg-neutral-dark hover:bg-white hover:text-neutral-dark  focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">
                                        <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path fill="currentColor"
                                                d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z" />
                                        </svg>
                                        <span class="ml-2 mt-5px">Procceed to checkout</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('extra-javascript')

@endpush
