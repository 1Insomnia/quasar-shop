<meta name="csrf-token" content="{{ csrf_token() }}">

@extends("admin.layouts.master")
@section('content')
    <section class="my-4">
        <a href="{{ route('admin.products.create') }}">
            <button type="button" class="btn btn-success btn-lg">
                Add Product
            </button>
        </a>
        <div>
            <div>
                <h3 class="text-success py-3">
                    @if (session('message'))
                        {{ session('message') }}
                    @endif
                </h3>
            </div>
        </div>
        <div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Stock</th>
                    <th>Product Status</th>
                    <th>Product Brand</th>
                    <th>Product Category</th>
                    <th>Details</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>
                            $ {{ number_format($product->price) }}
                        </td>
                        <td>
                            {{ $product->stock }}
                        </td>
                        <td>
                            @if ($product->status === 1)
                                <span class="text-success">Available</span>
                            @else
                                <span class="text-danger">Unavailable</span>
                            @endif
                        </td>
                        <td>
                            {{ $product->brand->name }}
                        </td>
                        <td>
                            {{ $product->category->name }}
                        </td>
                        <td>
                            <a href="{{ route('admin.products.show', $product->id) }}">
                                <button type="button" class="btn btn-block btn-primary">
                                    Details
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product->id) }}">
                                <button type="button" class="btn btn-block btn-warning">
                                    Edit
                                </button>
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-block btn-danger" data-toggle="modal"
                                    data-target="#exampleModal"
                                    data-id="{{ $product->id }}" id="btnDelete">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">This action is irreversible !</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    If you want to delete this product click delete.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form method="POST" action="" id="formDelete">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const btnDelete = document.querySelectorAll("#btnDelete");
        const formDelete = document.querySelector("#formDelete");

        btnDelete.forEach(value => value.addEventListener("click", (e) => {
            const id = e.target.dataset.id;
            formDelete.action = `products/${id}`;
        }));
    </script>
    {{ $products->links() }}
@stop
