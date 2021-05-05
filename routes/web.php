<?php

// Auth Controller
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

// Site Controllers
use App\Http\Controllers\Site\CameraController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\GalleryPostController;
use App\Http\Controllers\Site\LenseController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\UserController;
use App\Http\Controllers\Site\UpdatePasswordController;


// Import Admin Controllers
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\BrandController as AdminBrandController;
use \App\Http\Controllers\Admin\ChangePassword as AdminChangePasswordController;
use \App\Http\Controllers\Admin\GalleryPostController as AdminGalleryPostController;
use \App\Http\Controllers\Admin\ProductCategoryController as AdminProductCategoryController;
use \App\Http\Controllers\Admin\ProductController as AdminProductController;
use \App\Http\Controllers\Admin\ProductImageController as AdminProductImageController;

// Import Route
use \App\Http\Controllers\Admin\ProfileController as AdminProfileController;

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

Route::get('/gallery', GalleryPostController::class)->name('gallery');

// Login Page
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'post']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Register Controller
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Cameras Controller
Route::get('/cameras', [CameraController::class, 'index'])->name('cameras');
// Lenses Controller
Route::get('/lenses', [LenseController::class, 'index'])->name('lenses');
// Product Details Page
Route::resource('products', ProductController::class);
// Cart Controller
Route::resource('cart', CartController::class)->middleware('auth')->only(['index', 'show', 'store', 'update', 'destroy']);
// Checkout Controller
Route::get('checkout', [CheckoutController::class, 'sessionPayment'])->middleware('auth');
// User Controller

Route::get('/billing-portal', function (Request $request) {
    return auth()->user()->redirectToBillingPortal();
});

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
    Route::resource('profile', AdminProfileController::class);
    Route::resource('password', AdminChangePasswordController::class)->only([
        'index', 'update'
    ]);
});

Route::prefix('user')->middleware('auth')->name('user.')->group(function () {
    Route::resource('profile', UserController::class);
    Route::resource('update_password', UpdatePasswordController::class)->only(['edit', 'update']);
});
