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
                            <a href="{{ route('admin.product_images.edit', $product_image->id) }}">
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
                                    id="btnDelete">
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
    <!-- Modal -->
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
                    If you want to delete this image, click on the delete button.
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
@endsection
@section('js')
    <script>
        const btnDelete = document.querySelectorAll("#btnDelete");

        btnDelete.forEach(value => value.addEventListener("click", (e) => {
            const id = e.target.dataset.id;
            const formDelete = document.querySelector("#formDelete");

            formDelete.action = `product_images/${id}`;
        }));

        const successModal = document.querySelector("#success-modal");
    </script>
@endsection
