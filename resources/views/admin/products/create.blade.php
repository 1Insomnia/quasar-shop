@extends("admin.layouts.master");

@section('content')
    <div class="container mt-5">
        <form action="admin/products/create" method="post">
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
                <label for="description" class="form-label">Description</label>
                <div>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                </div>
            </div>
        </form>
    </div>
@endsection
