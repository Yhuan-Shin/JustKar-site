<?php


use App\Http\Controllers\InventoryController;

use Illuminate\Support\Facades\Route;
Route::get('/superadmin', function () {
    return view('superadmin/superadmin-login');
});


Route::get('/admin/login', function () {
    return view('admin/admin-login');
}); 
Route::get('/admin/home', function () {
    return view('admin/admin-home');
}); 
Route::get('/admin/products', function () {
    return view('admin/admin-products');
}); 
Route::get('/admin/sales', function () {
    return view('admin/admin-logs');
}); 
Route::get('/admin/user_management', function () {
    return view('admin/admin-cashier');
}); 
Route::get('/admin/cashier', function () {
    return view('admin/admin-cashier');
}); 
Route::get('/admin/inventory', function () {
    return view('admin/admin-inventory');
}); 

Route::get('/cashier/login', function () {
    return view('cashier/cashier-login');
}); 
Route::get('/cashier/pos', function () {
    return view('cashier/pos');
}); 


Route::get('/home', function () {
    return view('index');
});
Route::get('/customize', function () {
    return view('customize');
});
//functions
Route::get('/admin/inventory', [InventoryController::class, 'display'])->name('inventory.display');

Route::post('/admin/inventory', [InventoryController::class, 'store'])->name('inventory.store');

