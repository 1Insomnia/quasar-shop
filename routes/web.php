<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Site\LenseController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Site\CameraController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('site.home');
})->name('home');

Route::get('/contact', function () {
    return view('site.contact');
})->name('contact');

Route::get('/gallery', function () {
    return view('site.gallery');
})->name('gallery');

// Login Page
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'post']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
// Register Page
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Cameras and Lenses
Route::get('/cameras', [CameraController::class, 'index'])->name('cameras');
Route::get('/lenses', [LenseController::class, 'index'])->name('lenses');

// Products
Route::resource('products', ProductController::class);

Route::get('/admin', [AdminController::class])
    ->middleware('is_admin')
    ->name('admin');