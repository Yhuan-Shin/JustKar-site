<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomersController;
use App\Models\Customers;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('index');
});
Route::get('/customize', function () {
    return view('customize');
});
Route::get('/admin/login', function () {
    return view('admin/admin-login');
}); 
Route::get('/admin/home', function () {
    return view('admin/admin-home');
}); 
Route::get('/admin/order', function () {
    return view('admin/order');
}); 
Route::get('/admin/inventory', function () {
    return view('admin/admin-inventory');
}); 
//form
Route::post('/contact', [CustomersController::class, 'store']);//customerside
Route::get('/admin/home', [CustomersController::class, 'showHomePage'])->name('admin.home');
Route::get('/admin/order', [CustomersController::class, 'showOrderPage'])->name('admin.order');
