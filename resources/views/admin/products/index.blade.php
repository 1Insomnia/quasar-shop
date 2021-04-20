<meta name="csrf-token" content="{{ csrf_token() }}">

@extends("admin.layouts.master")
@section('content')
    <section class="my-4">
        <a href="{{ route('admin.products.create') }}">
            <button type="button" class="btn btn-success btn-lg">
                Add Product
            </button>
        </a>
        <section>
            <div>
                <h3 class="text-success py-3">
                    @if (session('message'))
                        {{ session('message') }}
                    @endif
                </h3>
            </div>
        </section>
        <section>
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
                            <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-block">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </section>
    </section>
    {{ $products->links() }}
@stop
