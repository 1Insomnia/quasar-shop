@extends('admin.layouts.master')
@section('title', 'Admin - Product Images')

@section('content')
    <section>
        <x-admin-title-block title="Product Images"></x-admin-title-block>
        <div class="mb-4">
            <a href="{{ route('admin.product_images.create') }}">
                <button type="button" class="btn btn-success btn-lg">
                    <i class="fas fa-plus-square pr-2"></i>
                    Add Product Image
                </button>
            </a>
        </div>
        <x-admin-big-feed-back></x-admin-big-feed-back>
        <div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Product Image Preview</th>
                    <th>Product Name</th>
                    <th>Product Image Path</th>
                    <th>Detail</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                @foreach ($product_images as $product_image)
                    <tr>
                        <td>
                            <img class="img-fluid img-thumbnail" src="{{ asset($product_image->image_path) }}" alt=""
                                 style="height: 200px; width: 200px; object-fit: cover;">
                        </td>
                        <td>
                            Product Name : {{ $product_image->product->name }}
                        </td>
                        <td>
                            {{ $product_image->image_path }}
                        </td>
                        <td>
                            <a href="{{ route('admin.product_images.show', $product_image->id) }}">
                                <button type="button" class="btn btn-block btn-primary">
                                    <i class="fas fa-info-circle pr-2"></i>
                                    Details
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $product_image->id) }}">
                                <button type="button" class="btn btn-block btn-warning">
                                    <i class="fas fa-edit pr-2"></i>
                                    Edit
                                </button>
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-block btn-danger" data-toggle="modal"
                                    data-target="#exampleModal"
                                    data-id="{{ $product_image->id }}"
                                    data-name={{ $product_image->name }} id="btnDelete">
                                <i class="fas fa-trash-alt pr-2"></i>
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{ $product_images->links() }}
    </section>
@endsection
