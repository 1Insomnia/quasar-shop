@extends("admin.layouts.master")
@section('title', 'Quasar Optic - Admin - Brand Edit')

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
                <h2 class="card-title">Edit Brand : {{ ucfirst($brand->name) }}</h2>
            </div>
            <form action="{{ route('admin.categories.update', $brand->id) }}" method="post" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Brand Name :</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $brand->name }}">
                        @error('name')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-label">Brand Status :</label>
                        <select class="custom-select" name="status" id="status">
                            <option value="1" @if ($brand->status === 1) selected @endif>Available</option>
                            <option value="0" @if ($brand->status === 0) selected @endif>Unavailable</option>
                        </select>
                        @error('status')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="card-footer bg-white pl-0">
                        <button class="btn btn-primary btn-lg" type="submit">
                            Edit Brand
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
