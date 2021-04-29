@extends('admin.layouts.master')

@section('content')
    <x-admin-big-feed-back></x-admin-big-feed-back>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body text-center">
                            <div>
                                <img src="https://img.icons8.com/bubbles/100/000000/administrator-male.png"
                                     class="card-img-top rounded-circle mb-4" alt="profile image"
                                     style="height: 128px; width: 128px;">
                                <h4>{{ $user->first_name }} {{ $user->last_name }}</h4>
                                <p class="text-muted mb-0">{{ $user->role }}</p>
                            </div>
                            <div class="border-top mt-3">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="{{ route('admin.password.index') }}">
                                            <button class="btn btn-info btn-sm mt-3 mb-4">Change Password</button>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-info btn-sm mt-3 mb-4">Edit Profile</button>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-info btn-sm mt-3 mb-4">Delete Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
