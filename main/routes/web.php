<?php

use App\Http\Controllers\AddCashierController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\InventorySearch;
use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
//superadmin
Route::get('/superadmin', function () {
    return view('superadmin/superadmin-login');
});

//admin
Route::get('/admin', function () {
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
    return view('admin/admin-user_management');
}); 
Route::get('/admin/announcements', function () {
    return view('admin/admin-announcement');
}); 
Route::get('/admin/inventory', function () {
    return view('admin/admin-inventory');
}); 


//cashier
Route::get('/cashier/login', function () {
    return view('cashier/cashier-login');
}); 
Route::get('/cashier/pos', function () {
    return view('cashier/pos');
}); 

//customers
Route::get('/', function () {
    return view('index');
});
Route::get('/customize', function () {
    return view('customize');
});

//crud functions inventory
Route::get('/admin/inventory', [InventoryController::class, 'display'])->name('inventory.display');

Route::post('/admin/inventory', [InventoryController::class, 'store'])->name('inventory.store');
// Route::get('/admin/inventory/{id}', [InventoryController::class, 'edit'])->name('inventory.edit');
Route::post('/admin/inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update');
Route::delete('/admin/inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');
//search
// Route::get('/admin/inventory/search', [InventoryController::class, 'search'])->name('inventory.search');
//critical level
Route::put('/admin/inventory', [InventoryController::class, 'setCriticalLevel'])->name('inventory.critical');



//functions user managements
Route::get('/admin/user_management', [AddCashierController::class, 'display'])->name('cashier.display');
Route::post('/admin/user_management', [AddCashierController::class, 'store'])->name('cashier.store');
Route::post('/admin/user_management/{id}', [AddCashierController::class, 'update'])->name('cashier.update');
Route::delete('/admin/user_management/{id}', [AddCashierController::class, 'destroy'])->name('cashier.destroy');

//functions announcement
Route::get('/admin/announcements', [AnnouncementController::class, 'display'])->name('announcement.display');
Route::post('/admin/announcements', [AnnouncementController::class, 'store'])->name('announcement.store');
Route::put('/admin/announcements/{id}', [AnnouncementController::class, 'update'])->name('announcement.update');
Route::delete('/admin/announcements/{id}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');

//display announcement
Route::get('/', [AnnouncementController::class, 'displayOnCustomers'])->name('announcement.display');

//functions products
Route::post('/admin/products{id}', [ProductsController::class, 'update'])->name('products.update');
Route::get('/admin/products', [ProductsController::class, 'display'])->name('products.display');





