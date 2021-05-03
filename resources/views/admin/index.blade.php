@extends('adminlte::page')

@section('title', 'Dashboard')

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
            <div class="info-box col-sm-4">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Likes</span>
                    <span class="info-box-number">93,139</span>
                </div>
            </div>
            <div class="info-box col-sm-4">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Likes</span>
                    <span class="info-box-number">93,139</span>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
