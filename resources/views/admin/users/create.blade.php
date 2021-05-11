@extends('admin.layouts.master')
@section('title', 'Admin - User Create')
@section('content')
    <div class="mt-5 text-center">
        <h1>Add a new <span class="text-info">user</span></h1>
    </div>
    <div class="container mt-5" style="max-width: 790px;">
        <div class="card card-primary">
            <div class="card-header">
                <h2 class="card-title">Add User</h2>
            </div>
            <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="font-weight-bold text-success">
                        Essential Informations
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="first_name" class="form-label">First Name :</label>
                        <input type="text" class="form-control" name="first_name" id="first_name"
                            value="{{ old('first_name') }}">
                        @error('first_name')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="form-label">Last Name :</label>
                        <input type="text" class="form-control" name="last_name" id="last_name"
                            value="{{ old('last_name') }}">
                        @error('last_name')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" class="form-control" name="password" id="password"
                            value="{{ old('password') }}">
                        @error('password')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Password Confirmation :</label>
                        <input type="password_confirmation" class="form-control" name="password_confirmation"
                            id="password_confirmation" value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="role" class="form-label">Password Confirmation :</label>
                        <select class="custom-select" name="role" id="role">
                            <option value="user" selected>User</option>
                            <option value="admin">Admin</option>
                        </select>
                        @error('role')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="font-weight-bold text-success">
                        Optional Informations
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone :</label>
                        <input type="phone" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-label">Address :</label>
                        <input type="address" class="form-control" name="address" id="address"
                            value="{{ old('address') }}">
                        @error('address')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="zipcode" class="form-label">Zipcode :</label>
                        <input type="zipcode" class="form-control" name="zipcode" id="zipcode"
                            value="{{ old('zipcode') }}">
                        @error('zipcode')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="city" class="form-label">City :</label>
                        <input type="city" class="form-control" name="city" id="city" value="{{ old('city') }}">
                        @error('city')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="country" class="form-label">Country :</label>
                        <input type="country" class="form-control" name="country" id="country"
                            value="{{ old('country') }}">
                        @error('country')
                            <div class="text-warning mt-2" role="alert">
                                {{ $message }}*
                            </div>
                        @enderror
                    </div>
                    <div class="card-footer bg-white pl-0 ">
                        <button class="btn btn-primary btn-lg" type="submit">
                            Add Product
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
