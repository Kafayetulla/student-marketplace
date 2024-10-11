<?php

use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminToLetController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\User\UserToLetController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'home'])->name('dashboard');
});

/* Admin Routes */
Route::middleware(['auth', 'admin'])->prefix('/admin')->as('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('products', AdminProductController::class);
    Route::resource('to-lets', AdminToLetController::class)->parameter('to-lets', 'product');
});


Route::get('/search-product', [AdminController::class, 'SearchProduct']);
Route::get('/search-order', [AdminController::class, 'SearchOrder']);
//Route::get('/user-orders', [AdminController::class, 'UserOrders'])->name('admin.user_orders');
Route::get('/update-order/{user_id}/{order_id}/{delivery_status}', [AdminController::class, 'UpdateOrder']);
Route::get('/print-bill/{order_id}', [AdminController::class, 'PrintBill']);
Route::get('/customers', [AdminController::class, 'Customers']);
Route::get('/delete-user/{id}', [AdminController::class, 'DeleteUser']);
Route::get('/search-user', [AdminController::class, 'SearchUser']);


/* User Routes */
Route::get('/', [HomeController::class, 'index'])->name('user.home');
Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware('auth', 'verified');
Route::middleware(['auth', 'user'])->prefix('/user')->as('user.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/address', [UserController::class, 'address'])->name('address');
    Route::get('/details', [UserController::class, 'details'])->name('details');
    Route::resource('products', UserProductController::class);
    Route::resource('to-lets', UserToLetController::class)->parameter('to-lets', 'product');
});

Route::get('/user/logout', [HomeController::class, 'UserLogout'])->middleware('auth')->name('user.logout');

Route::get('/shopping', [HomeController::class, 'shopping'])->name('shopping');
Route::get('/shopping/{product}', [HomeController::class, 'shoppingDetails'])->name('shopping.show');
Route::get('/to-lets', [HomeController::class, 'toLet'])->name('to-lets');
Route::get('/to-lets/{product}', [HomeController::class, 'toLetDetails'])->name('to-lets.show');
Route::get('/contact', [HomeController::class, 'ContactPage'])->name('user.contact');
Route::get('/search-a-product', [HomeController::class, 'SearchProduct']);
Route::get('/update-password', [HomeController::class, 'UpdatePassword']);
