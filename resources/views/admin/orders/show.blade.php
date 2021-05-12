@extends("admin.layouts.master")
@section('title', 'Quasar Optic - Admin - Order Show')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="p-4">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> {{ $order->order_number }}
                            </h2>
                        </div>
                        <div class="col-6">
                            <h5 class="text-right">Date: {{ $order->created_at->toFormattedDateString() }}</h5>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-4">Placed By
                            <address><strong>{{ $order->user->first_name }}</strong><br>Email: {{ $order->user->email }}
                            </address>
                        </div>
                        <div class="col-4">Ship To
                            <address><strong>{{ $order->first_name }}
                                    {{ $order->last_name }}</strong><br>{{ $order->address }}<br>{{ $order->city }},
                                {{ $order->country }} {{ $order->zipcode }}<br>{{ $order->phone }}<br></address>
                        </div>
                        <div class="col-4">
                            <b>Order ID:</b> {{ $order->order_number }}<br>
                            <b>Amount:</b>
                            {{ config('settings.currency_symbol') }}{{ round($order->grand_total, 2) }}<br>
                            <b>Payment Method:</b> {{ $order->payment_method }}<br>
                            <b>Payment Status:</b> {{ $order->payment_status == 1 ? 'Completed' : 'Not Completed' }}<br>
                            <b>Order Status:</b> {{ $order->status }}<br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->items as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ config('settings.currency_symbol') }}{{ round($item->price, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
