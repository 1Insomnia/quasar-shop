@extends("admin.layouts.master")
@section('title', 'Quasar Optic - Admin - Product Image Edit')

@section('content')
    <div class="container mt-5" style="max-width: 790px;">
        @if (session('message'))
            <div>
                <h3 class="text-success py-2">
                    {{ session('message') }}
                </h3>
            </div>
        @endif
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Edit Product Image of product : {{ $product_image->product->name }}</h2>
            </div>
            <form action="{{ route('admin.product_images.update', $product_image->id) }}" method="post"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="productId" class="form-label">Product Name :</label>
                        <select class="custom-select" name="product_id" id="productId">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" @if ($product_image->product->id === $product->id) selected @endif> {{ $product->name }}</option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label">Product Image : </label>
                        <input type="file" class="form-control-file" name="image" id="image">
                        @error('image')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="card-footer bg-white pl-0">
                        <button class="btn btn-primary btn-lg" type="submit">
                            Edit Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
