@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
    <nav class="nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link ml-0 pl-0" href="http://localhost:8000/" target="_blank" rel="noopener noreferrer">
                    Quasar Optic - Home Page
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8000/cameras" target="_blank" rel="noopener noreferrer">
                    Quasar Optic - Cameras
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8000/lenses" target="_blank" rel="noopener noreferrer">
                    Quasar Optic - Lenses
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8000/contacts" target="_blank" rel="noopener noreferrer">
                    Quasar Optic - Contacts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8000/gallery" target="_blank" rel="noopener noreferrer">
                    Quasar Optic - Gallery
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8000/login" target="_blank" rel="noopener noreferrer">
                    Quasar Optic - Login
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost:8000/register" target="_blank" rel="noopener noreferrer">
                    Quasar Optic - Register
                </a>
            </li>
        </ul>
    </nav>
@stop

@section('content')
    <h2 class="mb-4">Connected as <span class="text-primary">{{ auth()->user()->email }}</span></h2>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
    </script>
@stop
