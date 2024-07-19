<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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


// Route::get('/index', [HomeController::class, 'index'])->name('home');
