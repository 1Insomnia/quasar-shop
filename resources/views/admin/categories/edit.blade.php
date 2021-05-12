@extends("admin.layouts.master")
@section('title', 'Quasar Optic - Admin - Category Edit')

@section('content')
    <div class="mt-5 text-center">
        <h1>Edit <span class="text-info">Category</span></h1>
    </div>
    <div class="container mt-5" style="max-width: 790px;">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Edit Category : {{ ucfirst($category->name) }}</h2>
            </div>
            <form action="{{ route('admin.categories.update', $category->id) }}" method="post"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Category Name :</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
                        @error('name')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-label">Category Status :</label>
                        <select class="custom-select" name="status" id="status">
                            <option value="1" @if ($category->status === 1) selected @endif>Available</option>
                            <option value="0" @if ($category->status === 0) selected @endif>Unavailable</option>
                        </select>
                        @error('status')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="card-footer bg-white pl-0">
                        <button class="btn btn-primary btn-lg" type="submit">
                            Edit Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
