@extends("admin.layouts.master");

@section('content')
    <div class="container mt-5">
        <form action="{{ route('admin.products.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" name="price" id="price">
            </div>
            <div class="form-group">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" name="stock" id="stock">
            </div>
            <div class="form-group">
                <label for="brand" class="form-label">Status</label>
                <select name="brand" id="brand">
                    <option value="1">Canon</option>
                    <option value="2">Nikon</option>
                    <option value="3">Pentax</option>
                    <option value="4">Irix</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status">
                    <option value="1">Available</option>
                    <option value="0">Unavailable</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <div>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">
                    Add Product
                </button>
            </div>
        </form>
    </div>
@endsection
