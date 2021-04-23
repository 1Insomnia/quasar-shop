@extends("admin.layouts.master")
@section('content')
    <div class="mt-5 text-center">
        <h1>Add a new <span class="text-info">product image</span></h1>
    </div>
    <div class="container mt-5" style="max-width: 790px;">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Add Product Image</h2>
            </div>
            <form action="{{ route('admin.brands.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="productId" class="form-label">Product Name :</label>
                        <select class="custom-select" name="product_id" id="productId">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}"> {{ $product->name }}</option>
                            @endforeach
                        </select>
                        @error('status')
                        <div class="text-warning mt-2" role="alert">
                            {{ $message }}*
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label">Product Image :</label>
                        <input type="file" class="form-control-file" name="image" id="image">
                        @error('image')
                        <div class="text-warning mt-2" role="alert">
                            {{ $message }}*
                        </div>
                        @enderror
                    </div>
                    <div class="card-footer bg-white pl-0">
                        <button class="btn btn-primary btn-lg" type="submit">
                            Add Brand
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
