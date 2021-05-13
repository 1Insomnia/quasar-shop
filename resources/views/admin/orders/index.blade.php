@extends('admin.layouts.master')
@section('title', 'Quasar Optic - Admin - Orders Index')

@section('content')
    <section>
        <x-admin-title-block title="Product Images"></x-admin-title-block>
        <x-admin-big-feed-back></x-admin-big-feed-back>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Order Number</th>
                        <th>Place By</th>
                        <th>Total Amount</th>
                        <th>Item Quantity</th>
                        <th>Payment Status</th>
                        <th>Status</th>
                        <th>Details</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                @foreach ($orders as $order)
                    <tr>
                        <td>
                            {{ $order->order_number }}
                        </td>
                        <td>
                            {{ $order->first_name }} - {{ $order->last_name }}
                        </td>
                        <td>
                            {{ $order->grand_total }}
                        </td>
                        <td>
                            {{ $order->item_count }}
                        </td>
                        <td>
                            @if ($order->payment_status === 1)
                                <span class="badge badge-success">Completed</span>
                            @else
                                <span class="badge badge-danger">Not Completed</span>
                            @endif
                        </td>
                        <td>
                            {{ $order->status }}
                        </td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}">
                                <button type="button" class="btn btn-block btn-primary">
                                    <i class="fas fa-info-circle pr-2"></i>
                                    Details
                                </button>
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-block btn-danger" data-toggle="modal"
                                data-target="#exampleModal" data-id="{{ $order->id }}" id="btnDelete">
                                <i class="fas fa-trash-alt pr-2"></i>
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{ $orders->links() }}
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

            formDelete.action = `orders/${id}`;
        }));

        const successModal = document.querySelector("#success-modal");

    </script>
@endsection
