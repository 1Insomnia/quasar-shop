@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <h2 class="mb-4">Connected as <span class="text-primary">{{ auth()->user()->email }}</span></h2>
    <section>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Stock</th>
                    <th>Product Status</th>
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
                        <button type="button" class="btn btn-warning"><a href="">Edit</a></button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger"><a href="">Delete</a></button>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    </script>
@stop
