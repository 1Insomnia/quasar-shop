<?php

// Site Controllers
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Site\CameraController;
use App\Http\Controllers\Site\LenseController;

// Import Admin Controllers
use \App\Http\Controllers\Admin\ProductController as AdminProductController;
use \App\Http\Controllers\Admin\ProductCategoryController as AdminProductCategoryController;
use \App\Http\Controllers\Admin\BrandController as AdminBrandController;
use \App\Http\Controllers\Admin\ProductImageController as AdminProductImageController;
use \App\Http\Controllers\Admin\GalleryPostController as AdminGalleryPostController;

// Import Route
use Illuminate\Support\Facades\Route;

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

// Product Details Page
Route::resource('products', ProductController::class);

// Admin
Route::prefix('admin')->middleware("is_admin")->name('admin.')->group(function () {
    Route::get(('dashboard'), function () {
        return view('admin.index');
    })->name('dashboard');
    Route::resource('products', AdminProductController::class);
    Route::resource('categories', AdminProductCategoryController::class);
    Route::resource('brands', AdminBrandController::class);
    Route::resource('product_images', AdminProductImageController::class);
    Route::resource('gallery_posts', AdminGalleryPostController::class);
});