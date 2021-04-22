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
                <h2 class="card-title">Edit Product : {{ ucfirst($product->name) }}</h2>
            </div>
            <form action="{{ route('admin.products.update', $product->id) }}" method="post"
                  enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Product : Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
                        @error('name')
                        <div class="text-warning mt-2" role="alert">
                            {{ $message }}*
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price" class="form-label">Product : Price</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}">
                        @error('price')
                        <div class="text-warning mt-2" role="alert">
                            {{ $message }}*
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stock" class="form-label">Product : Stock</label>
                        <input type="text" class="form-control" name="stock" id="stock" value="{{ $product->stock }}">
                        @error('stock')
                        <div class="text-warning mt-2" role="alert">
                            {{ $message }}*
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category" class="form-label">Product : Category</label>
                        <select class="custom-select" name="category" id="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                        @if ($product->category->id === $category->id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="text-warning mt-2" role="alert">
                            {{ $message }}*
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label">Product Image : </label>
                        <input type="file" class="form-control-file" name="image" id="image"
                               value="{{ $product->image_path }}">
                        @error('image')
                        <div class="text-warning mt-2" role="alert">
                            {{ $message }}*
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="brand" class="form-label">Product : Brand</label>
                        <div>
                            <select class="custom-select" name="brand" id="brand">
                                @foreach ($brands as $brand)
                                    <option
                                        value={{ $brand->id }} @if ($product->brand->id === $brand->id) selected @endif>
                                        {{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('brand')
                        <div class="text-warning mt-2" role="alert">
                            {{ $message }}*
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-label">Product : Status</label>
                        <select class="custom-select" name="status" id="status">
                            <option value="1" @if ($product->status === 1) selected @endif>Available</option>
                            <option value="0" @if ($product->status === 0) selected @endif>Unavailable</option>
                        </select>
                        @error('status')
                        <div class="text-warning mt-2" role="alert">
                            {{ $message }}*
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Product : Description</label>
                        <div>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">
                                {{ $product->description }}
                            </textarea>
                        </div>
                        @error('description')
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
