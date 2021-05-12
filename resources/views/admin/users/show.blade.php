@extends('admin.layouts.master')
@section('title', 'Quasar Optic - Admin - User Show')

@section('content')
    <section class="container">
        <div class="card mx-auto" style="max-width: 560px;">
            <div class="card-header">
                <h3 class="card-title font-weight-bold"> {{ $user->first_name }} {{ $user->last_name }}</h3>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Email : {{ $user->email }}</li>
                <li class="list-group-item">Created at : {{ $user->created_at }}</li>
                <li class="list-group-item">Role : {{ $user->role }}</li>
                <li class="list-group-item">Orders : {{ $user->orders->count() }}</li>
            </ul>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @forelse ($user->orders as $order)
                        <h4>Orders</h4>
                        <li class="list-group-item">Order N°{{ $order->order_number }}</li>
                        <li class="list-group-item">Total : $ {{ number_format($order->grand_total, 2) }}</li>
                        <li class="list-group-item">Address : {{ $order->address }}</li>
                        <li class="list-group-item">Zipcode : {{ $order->zipcode }}</li>
                        <li class="list-group-item">City : {{ $order->city }}</li>
                        <li class="list-group-item">Country : {{ $order->country }}</li>
                    @empty
                        <li>No Orders</li>
                    @endforelse
                </ul>
            </div>
            <div class="card-footer">
                <div class="my-2">
                    <a href="{{ route('admin.users.edit', $user->id) }}">
                        <button type="button" class="btn btn-block btn-warning">
                            Edit
                        </button>
                    </a>
                </div>
                <div class="my-2">
                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
