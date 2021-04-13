@extends("admin.layouts.master")
@section('content')
    <h2 class="mb-4">Connected as <span class="text-primary">{{ auth()->user()->email }}</span></h2>
    <section class="my-4">
        <a href="{{ route('admin.products.create') }}">
            <button type="button" class="btn btn-success btn-lg">
                Add Product
            </button>
        </a>
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
                        <a href="{{ route('admin.products.edit', $product->id) }}">
                            <button type="button" class="btn btn-block btn-warning">
                                Edit
                            </button>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}">
                            @csrf
                            <input class="btn btn-block btn-danger" type="submit" name="_method" value="delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
@stop
