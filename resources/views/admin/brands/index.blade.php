@extends("admin.layouts.master")
@section('content')
    <section class="my-4">
        <a href="{{ route('admin.brands.create') }}">
            <button type="button" class="btn btn-success btn-lg">
                Add Brand
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
                    <th>Brand Name</th>
                    <th>Brand Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            @foreach ($brands as $brand)
                <tr>
                    <td>
                        {{ $brand->name }}
                    </td>
                    <td>
                        @if ($brand->status === 1)
                            <span class="text-success">Available</span>
                        @else
                            <span class="text-danger">Unavailable</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.brands.edit', $brand->id) }}">
                            <button type="button" class="btn btn-block btn-warning">
                                Edit
                            </button>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.brands.destroy', $brand->id) }}">
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
