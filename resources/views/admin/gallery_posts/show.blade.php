@extends("admin.layouts.master")

@section('content')
    <section class="container">
        <div class="card mx-auto" style="max-width: 560px;">
            <img class="card-image-top" src="{{ asset($gallery_post->image_path) }}" alt="">
            <div class="card-body">
                <h3 class="card-title font-weight-bold"> {{ $gallery_post->title }}</h3>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    {{ $gallery_post->author }}
                </li>
                <li class="list-group-item">
                    {{ $gallery_post->location }}
                </li>
                <li class="list-group-item">
                    {{ $gallery_post->product->name }}
                </li>
            </ul>
            <div class="card-body">
                <p class="card-text">
                    {{ $gallery_post->description }}
                </p>
            </div>
            <div class="card-footer">
                <div class="my-2">
                    <a href="{{ route('admin.gallery_posts.edit', $gallery_post->id) }}">
                        <button type="button" class="btn btn-block btn-warning">
                            Edit
                        </button>
                    </a>
                </div>
                <div class="my-2">
                    <form method="POST" action="{{ route('admin.gallery_posts.destroy', $gallery_post->id) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
