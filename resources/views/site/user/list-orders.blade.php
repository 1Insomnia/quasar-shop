@extends('layouts.master')
@section('title', 'User Orders')

@section('content')
    <div>
        <ul>
            @foreach($user->orders as $order)
                <li>
                    {{ $order->grand_total }}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
