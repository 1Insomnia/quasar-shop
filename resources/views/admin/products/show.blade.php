@extends("admin.layouts.master")

@section('content')
    <section class="container">
        <div class="card mx-auto" style="max-width: 560px;">
            <img class="card-image-top" src="{{ asset($product->image_path) }}" alt="">
            <div class="card-body">
                <h3 class="card-title font-weight-bold"> {{ $product->name }}</h3>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"> {{ $product->category_id === 1 ? 'Cameras' : 'Lenses' }}</li>
                <li class="list-group-item">
                    @switch($product->brand_id)
                        @case(1)
                        <span>Canon</span>
                        @break
                        @case(2)
                        <span>Nikon</span>
                        @break
                        @case(3)
                        <span>Pentax</span>
                        @break
                        @case(4)
                        <span>Irix</span>
                        @break
                    @endswitch
                </li>
                <li class="list-group-item">$ {{ number_format($product->price) }}</li>
                <li class="list-group-item">
                    @switch($product->status)
                        @case (0)
                        <span class="text-danger">Unavailable</span>
                        @break
                        @case (1)
                        <span class="text-success">Available</span>
                        @break
                    @endswitch
                </li>
                <li class="list-group-item">{{ $product->stock }} units</li>
            </ul>
            <div class="card-body">
                <p class="card-text">
                    {{ $product->description }}
                </p>
            </div>
            <div class="card-footer">
                <div class="my-2">
                    <a href="{{ route('admin.products.edit', $product->id) }}">
                        <button type="button" class="btn btn-block btn-warning">
                            Edit
                        </button>
                    </a>
                </div>
                <div class="my-2">
                    <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
