@extends("admin.layouts.master")
@section('title', 'Quasar Optic - Admin - Product Image Show')

@section('content')
    <section class="container">
        <div class="card mx-auto" style="max-width: 560px;">
            <img class="card-image-top" src="{{ asset($product_image->image_path) }}" alt="">
            <div class="card-body">
                <h3 class="card-title font-weight-bold">Product Name : {{ $product_image->product->name }}</h3>
                <br>
                <p>Image Path : {{ $product_image->image_path }}</p>
            </div>
            <div class="card-footer">
                <div class="my-2">
                    <a href="{{ route('admin.product_images.edit', $product_image->id) }}">
                        <button type="button" class="btn btn-block btn-warning">
                            Edit
                        </button>
                    </a>
                </div>
                <div class="my-2">
                    <form method="POST" action="{{ route('admin.product_images.destroy', $product_image->id) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
