@extends("admin.layouts.master")
@section('content')
    <section class="my-4">
        <a href="{{ route('admin.categories.create') }}">
            <button type="button" class="btn btn-success btn-lg">
                Add Category
            </button>
        </a>
    </section>
    <section>
        {{-- Feedback --}}
        <div class="text-success py-3">
            @if (session('message'))
                {{ session('message') }}
            @endif
        </div>
    </section>
    <section>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Category Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            @foreach ($categories as $category)
                <tr>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        @if ($category->status === 1)
                            <span class="text-success">Available</span>
                        @else
                            <span class="text-danger">Unavailable</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}">
                            <button type="button" class="btn btn-block btn-warning">
                                Edit
                            </button>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-block">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
@stop
