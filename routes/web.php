<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/home', [HomeController::class, 'index'])->name('home');;
// routes/web.php
Route::get('product/{id}', [HomeController::class, 'show'])->name('product.show');
Route::get('/category/{id}', [HomeController::class, 'showByCategory'])->name('category.show');
// Route cho tìm kiếm sản phẩm
Route::get('/search', [HomeController::class, 'search'])->name('product.search');

// Route cho gio hang   
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/checkout/selected', [CartController::class, 'checkoutSelected'])->name('checkout.selected');

// web.php

Route::patch('/cart/update-quantity/{id}', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
// route check out


Route::get('/checkout/confirm', [CheckoutController::class, 'confirm'])->name('checkout.confirm');
Route::post('/checkout/confirm', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');

Route::get('/order/invoice/{id}', [CheckoutController::class, 'invoice'])->name('order.invoice');


// Route::get('/index', [HomeController::class, 'index'])->name('home');

// comment
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
// Route for displaying comments on product page
Route::get('/products/{id}/comments', [CommentController::class, 'show'])->name('comments.show');

Route::get('/admin', [HomeController::class, 'showAdmin'])->name('admin');;

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);

Route::resource('orders', OrderController::class);
Route::resource('users', UserController::class);