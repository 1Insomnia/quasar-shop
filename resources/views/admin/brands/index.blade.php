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
                <th>Detail</th>
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
                        <a href="{{ route('admin.brands.show', $brand->id) }}">
                            <button type="button" class="btn btn-block btn-primary">
                                Detail
                            </button>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.brands.edit', $brand->id) }}">
                            <button type="button" class="btn btn-block btn-warning">
                                Edit
                            </button>
                        </a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-block btn-danger" data-toggle="modal"
                                data-target="#exampleModal"
                                data-id="{{ $brand->id }}" id="btnDelete">
                            Delete &cross;
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
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
                    If you want to delete this brand click delete.
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
    <script>
        const btnDelete = document.querySelectorAll("#btnDelete");
        const formDelete = document.querySelector("#formDelete");

        btnDelete.forEach(value => value.addEventListener("click", (e) => {
            const id = e.target.dataset.id;
            formDelete.action = `brands/${id}`;
        }));
    </script>
@stop
