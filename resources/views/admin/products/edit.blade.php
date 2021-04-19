@extends("admin.layouts.master")

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
                <h2 class="card-title">Add Product</h2>
            </div>
            <form action="{{ route('admin.products.update', $product->id) }}" method="post"
                  enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
                        @error('name')
                        <div class="text-warning mt-2" role="alert">
                            {{ $message }}*
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}">
                        @error('price')
                        <div class="text-warning mt-2" role="alert">
                            {{ $message }}*
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="text" class="form-control" name="stock" id="stock" value="{{ $product->stock }}">
                        @error('stock')
                        <div class="text-warning mt-2" role="alert">
                            {{ $message }}*
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category" class="form-label">Category</label>
                        <select class="custom-select" name="category" id="category">
                            <option value="1" @if($product->category_id === 1) selected @endif>Cameras</option>
                            <option value="2" @if($product->category_id === 2) selected @endif>Lenses</option>
                        </select>
                        @error('category')
                        <div class="text-warning mt-2" role="alert">
                            {{ $message }}*
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control-file" name="image" id="image" value="{{ $product->image_path }}">
                        @error('image')
                        <div class="text-warning mt-2" role="alert">
                            {{ $message }}*
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="brand" class="form-label">Brand</label>
                        <div>
                            <select class="custom-select" name="brand" id="brand">
                                <option value="1" @if($product->brand_id === 1) selected @endif>Canon</option>
                                <option value="2" @if($product->brand_id === 2) selected @endif>Nikon</option>
                                <option value="3" @if($product->brand_id === 3) selected @endif>Pentax</option>
                                <option value="4" @if($product->brand_id === 4) selected @endif>Irix</option>
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
                            <option value="1" @if($product->status === 1) selected @endif>Available</option>
                            <option value="0" @if($product->status === 0) selected @endif>Unavailable</option>
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
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10"
                                      value="{{ $product->description }}">
                                {{ $product->description }}
                            </textarea>
                        </div>
                        @error('description')
                        <div class="text-warning mt-2" role="alert">
                            {{ $message }}*
                        </div>
                        @enderror
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-lg" type="submit">
                            Add Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection