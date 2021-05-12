@extends("admin.layouts.master")
@section('title', 'Quasar Optic - Admin - Product Create')

@section('content')
    <div class="mt-5 text-center">
        <h1>Add a new <span class="text-info">product</span></h1>
    </div>
    <div class="container mt-5" style="max-width: 790px;">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Add Product</h2>
            </div>
            <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Product Name:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-label">Product Price :</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}">
                        @error('price')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stock" class="form-label">Product Stock :</label>
                        <input type="text" class="form-control" name="stock" id="stock" value="{{ old('stock') }}">
                        @error('stock')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category" class="form-label">Product Category :</label>
                        <select class="custom-select" name="category" id="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ ucfirst($category->name) }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="brand" class="form-label">Product Brand :</label>
                        <select class="custom-select" name="brand" id="brand">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ ucfirst($brand->name) }}</option>
                            @endforeach
                        </select>
                        @error('category')
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
                    <div class="form-group">
                        <label for="status" class="form-label">Product Status :</label>
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
                        <label for="description" class="form-label">Product Description :</label>
                        <div>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10"
                                value="{{ old('description') }}"></textarea>
                        </div>
                        @error('description')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="card-footer bg-white pl-0 ">
                        <button class="btn btn-primary btn-lg" type="submit">
                            Add Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
