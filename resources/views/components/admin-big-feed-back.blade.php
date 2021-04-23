@if (session('message'))
    <div class="py-4 alert alert-success">
        <h3 class="">
            {{ session('message') }}
        </h3>
    </div>
@endif
