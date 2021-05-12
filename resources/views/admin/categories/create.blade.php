@extends("admin.layouts.master")
@section('title', 'Quasar Optic - Admin - Category Create')

@section('content')
    <div class="mt-5 text-center">
        <h1>Add a new <span class="text-info">category</span></h1>
    </div>
    <div class="container mt-5" style="max-width: 790px;">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Add Category</h2>
            </div>
            <form action="{{ route('admin.categories.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Category Name :</label>
                        <input type="text" class="form-control" name="name" id="name">
                        @error('name')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-label">Category Status :</label>
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
                    <div class="card-footer bg-white pl-0">
                        <button class="btn btn-primary btn-lg" type="submit">
                            Add Category
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
