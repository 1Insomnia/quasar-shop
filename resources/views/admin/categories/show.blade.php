@extends("admin.layouts.master")

@section('content')
    <section class="container">
        <div class="card mx-auto" style="max-width: 560px;">
            <div class="card-header">
                <h3 class="card-title font-weight-bold"> Category : {{ $category->name }}</h3>
            </div>
            <div class="card-body">
                <p class="card-text">
                    @if ($category->status === 1)
                        <span class="text-success">Available</span>
                    @else
                        <span class="text-danger">Unavailable</span>
                    @endif
                </p>
            </div>
            <div class="card-footer">
                <div class="my-2">
                    <a href="{{ route('admin.categories.edit', $category->id) }}">
                        <button type="button" class="btn btn-block btn-warning">
                            Edit
                        </button>
                    </a>
                </div>
                <div class="my-2">
                    <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
