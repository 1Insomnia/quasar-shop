@extends('admin.layouts.master')
@section('title', 'Admin - Gallery Posts')

@section('content')
    <section>
        <x-admin-title-block title="Product Images"></x-admin-title-block>
        <div class="mb-4">
            <a href="{{ route('admin.gallery_posts.create') }}">
                <button type="button" class="btn btn-success btn-lg">
                    <i class="fas fa-plus-square pr-2"></i>
                    Add Gallery Post
                </button>
            </a>
        </div>
        <x-admin-big-feed-back></x-admin-big-feed-back>
        <div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Image Preview</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Gear</th>
                    <th>Author</th>
                    <th>Location</th>
                    <th>Detail</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                @foreach ($gallery_posts as $gallery_post)
                    <tr>
                        <td>
                            <img class="img-fluid img-thumbnail" src="{{ asset($gallery_post->image_path) }}" alt=""
                                 style="height: 200px; width: 200px; object-fit: cover;">
                        </td>
                        <td>
                            {{ $gallery_post->title }}
                        </td>
                        <td style="max-width: 60ch;">
                            {{ $gallery_post->description }}
                        </td>
                        <td>
                            {{ $gallery_post->product->name }}
                        </td>
                        <td>
                            {{ $gallery_post->author }}
                        </td>
                        <td>
                            {{ $gallery_post->location }}
                        </td>
                        <td>
                            <a href="{{ route('admin.gallery_posts.show', $gallery_post->id) }}">
                                <button type="button" class="btn btn-block btn-primary">
                                    <i class="fas fa-info-circle pr-2"></i>
                                    Details
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.gallery_posts.edit', $gallery_post->id) }}">
                                <button type="button" class="btn btn-block btn-warning">
                                    <i class="fas fa-edit pr-2"></i>
                                    Edit
                                </button>
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-block btn-danger" data-toggle="modal"
                                    data-target="#exampleModal"
                                    data-id="{{ $gallery_post->id }}"
                                    id="btnDelete">
                                <i class="fas fa-trash-alt pr-2"></i>
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{ $gallery_posts->links() }}
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
                    If you want to delete this gallery post, click on the delete button.
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

            formDelete.action = `gallery_posts/${id}`;
        }));

        const successModal = document.querySelector("#success-modal");
    </script>
@endsection
