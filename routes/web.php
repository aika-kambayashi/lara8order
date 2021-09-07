<?php

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
    return redirect('/admin/login');
});
Route::get('/admin', [App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get('/admin/user', [App\Http\Controllers\UserController::class,'index'])->name('admin.user.index');
Route::get('/admin/user/edit', [App\Http\Controllers\UserController::class,'edit'])->name('admin.user.edit');
Route::put('/admin/user', [App\Http\Controllers\UserController::class,'update'])->name('admin.user.update');
Route::get('/admin/user/edit/password', [App\Http\Controllers\UserController::class,'editPassword'])->name('admin.user.edit.password');
Route::put('/admin/user/edit', [App\Http\Controllers\UserController::class,'updatePassword'])->name('admin.user.update.password');

// Auth::routes();

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
Route::post('/admin/login', [App\Http\Controllers\Auth\LoginController::class,'login']);
Route::get('/admin/logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
Route::post('/admin/logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::get('/admin/register', [App\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/admin/register', [App\Http\Controllers\Auth\RegisterController::class,'register']);

Route::get('/admin/password/reset', [App\Http\Controllers\ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('/admin/password/email', [App\Http\Controllers\ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('/admin/password/reset/{token}', [App\Http\Controllers\ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('/admin/password/reset', [App\Http\Controllers\ResetPasswordController::class,'reset'])->name('password.update');

Route::get('/admin/order', [App\Http\Controllers\OrderController::class,'index'])->name('admin.order.index');
Route::get('/admin/order/create', [App\Http\Controllers\OrderController::class,'create'])->name('admin.order.create');
Route::post('/admin/order', [App\Http\Controllers\OrderController::class,'store'])->name('admin.order.store');
Route::get('/admin/order/{id}/show', [App\Http\Controllers\OrderController::class,'show'])->name('admin.order.show');
Route::get('/admin/order/{id}/edit', [App\Http\Controllers\OrderController::class,'edit'])->name('admin.order.edit');
Route::get('/admin/order/{id}/edit2', [App\Http\Controllers\OrderController::class,'edit2'])->name('admin.order.edit2');
Route::post('admin/order/{id}/edit2ajax', [App\Http\Controllers\OrderController::class,'edit2ajax'])->name('admin.order.edit2ajax');
Route::put('/admin/order/{id}', [App\Http\Controllers\OrderController::class,'update2'])->name('admin.order.update2');

Route::get('/admin/order/{id}/detail/create', [App\Http\Controllers\OrderDetailController::class,'create'])->name('admin.orderdetail.create');
Route::post('/admin/order/{id}/detail', [App\Http\Controllers\OrderDetailController::class,'store'])->name('admin.orderdetail.store');
Route::get('/admin/order/{id}/detail/edit', [App\Http\Controllers\OrderDetailController::class,'edit'])->name('admin.orderdetail.edit');
Route::put('/admin/order/{id}/detail', [App\Http\Controllers\OrderDetailController::class,'update'])->name('admin.orderdetail.update');

Route::get('/admin/product', [App\Http\Controllers\ProductController::class,'index'])->name('admin.product.index');
Route::get('/admin/product/create', [App\Http\Controllers\ProductController::class,'create'])->name('admin.product.create');
Route::post('/admin/product', [App\Http\Controllers\ProductController::class,'store'])->name('admin.product.store');
Route::get('/admin/product/{id}/edit', [App\Http\Controllers\ProductController::class,'edit'])->name('admin.product.edit');
Route::put('/admin/product/{id}', [App\Http\Controllers\ProductController::class,'update'])->name('admin.product.update');

Route::get('/admin/customer', [App\Http\Controllers\CustomerController::class,'index'])->name('admin.customer.index');
Route::get('/admin/customer/create', [App\Http\Controllers\CustomerController::class,'create'])->name('admin.customer.create');
Route::post('/admin/customer', [App\Http\Controllers\CustomerController::class,'store'])->name('admin.customer.store');
Route::get('/admin/customer/{id}/edit', [App\Http\Controllers\CustomerController::class,'edit'])->name('admin.customer.edit');
Route::put('/admin/customer/{id}', [App\Http\Controllers\CustomerController::class,'update'])->name('admin.customer.update');