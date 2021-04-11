@extends("admin.layouts.master")

@section('content')
    <div class="container mt-5" style="max-width: 790px;">
        <h2 class="text-center mb-2">Add a product</h2>
        <h3></h3>
        <form action="{{ route('admin.products.store') }}" method="post">
            @csrf
            @if (session('success'))
                <h3 class="text-success">
                    {{ session('success') }}
                </h3>
            @endif
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name">
                @error('name')
                    <div class="text-warning mt-2" role="alert">
                        {{ $message }}*
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="price">
                @error('price')
                    <div class="text-warning mt-2" role="alert">
                        {{ $message }}*
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" name="stock" id="stock">
                @error('stock')
                    <div class="text-warning mt-2" role="alert">
                        {{ $message }}*
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category" class="form-label">Category</label>
                <select class="custom-select" name="category" id="category">
                    <option value="1">Cameras</option>
                    <option value="2">Lenses</option>
                </select>
                @error('category')
                    <div class="text-warning mt-2" role="alert">
                        {{ $message }}*
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image_path" class="form-label">image_path</label>
                <input type="text" class="form-control" name="image_path" id="image_path">
                @error('image_path')
                    <div class="text-warning mt-2" role="alert">
                        {{ $message }}*
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="brand" class="form-label">Brand</label>
                <div>
                    <select class="custom-select" name="brand" id="brand">
                        <option value="1" selected>Canon</option>
                        <option value="2">Nikon</option>
                        <option value="3">Pentax</option>
                        <option value="4">Irix</option>
                    </select>
                </div>
                @error('brand')
                    <div class="text-warning mt-2" role="alert">
                        {{ $message }}*
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select class="custom-select" name="status" id="status">
                    <option value="1">Available</option>
                    <option value="0">Unavailable</option>
                </select>
                @error('status')
                    <div class="text-warning mt-2" role="alert">
                        {{ $message }}*
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <div>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                </div>
                @error('description')
                    <div class="text-warning mt-2" role="alert">
                        {{ $message }}*
                    </div>
                @enderror
            </div>
            <div>
                <button class="btn btn-primary btn-lg" type="submit">
                    Add Product
                </button>
            </div>
        </form>
    </div>
@endsection
