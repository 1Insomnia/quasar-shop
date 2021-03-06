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
use App\Http\Controllers\Site\LensController;
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
use \App\Http\Controllers\Admin\OrderController as AdminOrderController;
use \App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

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
Route::get('/cameras', CameraController::class)->name('cameras');
// Lenses Controller
Route::get('/lenses', LensController::class)->name('lenses');
// Product Details Page
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
// Cart Controller
Route::resource('cart', CartController::class)->middleware('auth')->only(['index', 'show', 'store', 'update', 'destroy']);

// Privacy route

Route::get('/privacy', function () {
    return view('site.privacy.index');
})->name('privacy.index');

// Checkout Controller
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'getCheckout'])->name('checkout.index');
    Route::post('/checkout/order', [CheckoutController::class, 'placeOrder'])->name('checkout.place.order');
    Route::get('/checkout/confirm/{id}', [CheckoutController::class, 'checkoutConfirm'])->name('checkout.confirm');
    Route::post('/checkout/payment', [CheckoutController::class, 'checkoutPayment'])->name('checkout.payment');
    Route::delete('/checkout/delete/{id}', [CheckoutController::class, 'deleteOrder'])->name('checkout.delete');
    Route::get('/checkout/payment/success/{id}', [CheckoutController::class, 'paymentSuccess'])->name('checkout.payment.success');
    Route::get('/checkout/payment/fail/{id}', [CheckoutController::class, 'paymentFail'])->name('checkout.payment.fail');
});

// User Controller
Route::prefix('user')->middleware('auth')->name('user.')->group(function () {
    Route::get('orders', [UserController::class, 'listOrders'])->name('list_orders');
    Route::resource('profile', UserController::class)->only(['show', 'edit', 'update', 'destroy']);
    Route::resource('update_password', UpdatePasswordController::class)->only(['edit', 'update']);
});

// Admin
Route::prefix('admin')->middleware("is_admin")->name('admin.')->group(function () {
    Route::get('dashboard', AdminDashboardController::class)->name('dashboard');
    Route::resource('products', AdminProductController::class);
    Route::resource('categories', AdminProductCategoryController::class);
    Route::resource('brands', AdminBrandController::class);
    Route::resource('product_images', AdminProductImageController::class);
    Route::resource('gallery_posts', AdminGalleryPostController::class);
    Route::resource('profile', AdminProfileController::class);
    Route::resource('users', AdminUserController::class);
    Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'destroy']);
    Route::resource('password', AdminChangePasswordController::class)->only([
        'index', 'update'
    ]);
});