@extends('adminlte::page')

@section('title', 'DashboardController')

@section('content_header')
@endsection

@section('content')
    <section>
        <div>
            <h2 class="mb-4">Connected as <span class="text-primary">{{ auth()->user()->first_name }}</span></h2>
        </div>
    </section>
    <section>
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="card">
                    <a href="#">
                        <div class="p-4">
                            <center><i class=" fa fa-box fa-3x" style=""></i></center>
                        </div>
                        <div class="p-4">
                            <div>
                                <h4>Products</h4>
                                <ul class="card-list">
                                    <li class="list-item">Stock : {{ $products->sum('stock') }}</li>
                                    <li class="list-item">
                                        Cameras : {{ $products->where('category_id', '1')->sum('stock') }}
                                    </li>
                                    <li class="list-item">
                                        Lenses : {{ $products->where('category_id', '2')->sum('stock') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="card">
                    <a href="#">
                        <div class="p-4">
                            <center><i class="fa fa-box fa-3x" style=""></i></center>
                        </div>
                        <div class="p-4">
                            <div>
                                <h4>Orders</h4>
                                <ul class="card-list">
                                    <li class="list-item">
                                        Sales : $ {{ number_format($orders->sum('grand_total'), 2) }}
                                    </li>
                                    <li class="list-item">
                                        Avg Order : $ {{ number_format($orders->avg('grand_total'), 2) }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="card">
                    <a href="#">
                        <div class="p-4">
                            <center><i class=" fa fa-box fa-3x" style=""></i></center>
                        </div>
                        <div class="p-4">
                            <div>
                                <h4>Brands</h4>
                                <ul class="card-list">
                                    <li class="list-item"> {{ $brands->count('id') }}</li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <div class="card">
                    <a href="#">
                        <div class="p-4">
                            <center><i class=" fa fa-box fa-3x" style=""></i></center>
                        </div>
                        <div class="p-4">
                            <div>
                                <h4>Users</h4>
                                <ul class="card-list">
                                    <li class="list-item"> Registration : {{ $users->count('id') }}</li>
                                </ul>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
    </section>
@endsection
