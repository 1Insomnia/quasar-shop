@extends("admin.layouts.master")

@section('content')
    <section class="container">
        <div class="card mx-auto" style="max-width: 560px;">
            <div class="card-body">
                <h3 class="card-title font-weight-bold"> Order : n°-{{ $order->order_number }}</h3>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    {{ $order->first_name }} - {{ $order->last_name }}
                </li>
                <li class="list-group-item">
                    {{ $order->grand_total }}
                </li>
                <li class="list-group-item">
                    {{ $order->payment_status }}
                </li>
                <li class="list-group-item">
                    {{ $order->status }}
                </li>
            </ul>
            <div class="card-footer">
                <div class="my-2">
                    <a href="">
                        <button type="button" class="btn btn-block btn-warning">
                            Edit
                        </button>
                    </a>
                </div>
                <div class="my-2">
                    <form method="POST" action="{{ route('admin.order.destroy', $gallery_post->id) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
