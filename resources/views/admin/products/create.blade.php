@extends("admin.layouts.master")

@section('content')
    <div class="container mt-5" style="max-width: 790px;">
        <form action="{{ route('admin.products.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name">
                @error('name')
                    <span class="invalid-feedback">
                        {{ $message }}*
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="price">
                @error('price')
                    <span class="invalid-feedback">
                        {{ $message }}*
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" name="stock" id="stock">
                @error('stock')
                    <span class="invalid-feedback">
                        {{ $message }}*
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="brand" class="form-label">Status</label>
                <div>
                    <select class="custom-select" name="brand" id="brand">
                        <option value="1" selected>Canon</option>
                        <option value="2">Nikon</option>
                        <option value="3">Pentax</option>
                        <option value="4">Irix</option>
                    </select>
                </div>
                @error('brand')
                    <span class="invalid-feedback">
                        {{ $message }}*
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select class="custom-select" name="status" id="status">
                    <option value="1">Available</option>
                    <option value="0">Unavailable</option>
                </select>
                @error('status')
                    <span class="invalid-feedback">
                        {{ $message }}*
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <div>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div>
                <button class="btn btn-primary btn-lg" type="submit">
                    Add Product
                </button>
            </div>
        </form>
    </div>
@endsection
