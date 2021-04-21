@extends("admin.layouts.master")

@section('content')
    <div class="mt-5 text-center">
        <h1>Add a new <span class="text-info">brand</span></h1>
    </div>
    <div class="container mt-5" style="max-width: 790px;">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Add Brand</h2>
            </div>
            <form action="{{ route('admin.brands.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Brand Name :</label>
                        <input type="text" class="form-control" name="name" id="name">
                        @error('name')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-label">Brand Status :</label>
                        <select class="custom-select" name="status" id="status">
                            <option value="1">Available</option>
                            <option value="0">Unavailable</option>
                        </select>
                        @error('status')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>t
                        @enderror
                    </div>
                    <div class="card-footer bg-white pl-0">
                        <button class="btn btn-primary btn-lg" type="submit">
                            Add Brand
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
