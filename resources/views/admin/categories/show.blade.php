@extends("admin.layouts.master")
@section('title', 'Quasar Optic - Admin - Category Show')

@section('content')
    <section class="container">
        <div class="card mx-auto" style="max-width: 560px;">
            <div class="card-header">
                <h3 class="card-title font-weight-bold text-primary py-2"> Category : {{ $category->name }}</h3>
            </div>
            <div class="card-body">
                <p class="card-text">
                    @if ($category->status === 1)
                        Status : <span class="text-success">Available</span>
                    @else
                        Status : <span class="text-danger">Unavailable</span>
                    @endif
                </p>
            </div>
            <div class="card-footer bg-white py-2">
                <div class="my-2">
                    <a href="{{ route('admin.categories.edit', $category->id) }}">
                        <button type="button" class="btn btn-block btn-warning">
                            <i class="fas fa-edit pr-2"></i>
                            Edit
                        </button>
                    </a>
                </div>
                <div class="my-2">
                    <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#exampleModal"
                        data-id="{{ $category->id }}" data-name={{ $category->name }} id="btnDelete">
                        <i class="fas fa-trash-alt pr-2"></i>
                        Delete
                    </button>
                </div>
            </div>
        </div>
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

        btnDelete.forEach(value => value.addEventListener("click", (e) => {
            const id = e.target.dataset.id;
            const categoryName = e.target.dataset.name;
            const formDelete = document.querySelector("#formDelete");
            const modalBody = document.querySelector('.modal-body');

            modalBody.innerHTML =
                `If you want to delete category : <span class="text-danger">${categoryName}</span> click delete`;

            formDelete.action = `{{ url('admin/categories') }}/${id}`;
        }));

    </script>
@endsection
