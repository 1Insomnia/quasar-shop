@extends("admin.layouts.master")
@section('title', 'Quasar Optic - Admin - Gallery Post Show')

@section('content')
    <div class="mt-5 text-center">
        <h1>Add a new <span class="text-info">gallery post</span></h1>
    </div>
    <div class="container mt-5" style="max-width: 790px;">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Add Gallery Post</h2>
            </div>
            <form action="{{ route('admin.gallery_posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="form-label">Gallery Post Title :</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="author" class="form-label">Gallery Post Author :</label>
                        <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
                        @error('author')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="location" class="form-label">Gallery Post Location :</label>
                        <input type="text" class="form-control" name="location" id="location"
                            value="{{ old('location') }}">
                        @error('location')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product_id" class="form-label">Gallery Post Gear :</label>
                        <select class="custom-select" name="product_id" id="product_id">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ ucfirst($product->name) }}</option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label">Gallery Post Image :</label>
                        <input type="file" class="form-control-file" name="image" id="image">
                        @error('image')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">Gallery Post Description :</label>
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
                            Add Gallery Post
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
