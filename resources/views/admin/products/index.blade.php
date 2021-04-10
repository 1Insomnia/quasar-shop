@extends("admin.layouts.master")
@section('content')
    <h2 class="mb-4">Connected as <span class="text-primary">{{ auth()->user()->email }}</span></h2>
    <section class="my-4">
        <button type="button" class="btn btn-outline-success">
            <a href="{{ route('admin.products.create') }}">Add Product</a>
        </button>
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
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            @foreach ($all_products as $product)
                <tr>
                    <td>
                        {{ $product->name }}
                    </td>
                    <td>
                        $ {{ $product->price }}
                    </td>
                    <td>
                        {{ $product->stock }}
                    </td>
                    <td>
                        @if ($product->status === 1)
                            <span>
                                Available
                            </span>
                        @else
                            Unavailable
                        @endif
                    </td>
                    <td>
                        @switch($product->brand_id)
                            @case(1)
                            <span>Canon</span>
                            @break
                            @case(2)
                            <span>Nikon</span>
                            @break
                            @case(3)
                            <span>Pentax</span>
                            @break
                            @case(4)
                            <span>Irix</span>
                            @break
                            @default

                        @endswitch
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-warning"><a href="">Edit</a></button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-danger"><a href="">Delete</a></button>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
@stop
