<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CashierManagement;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\InventoryPdfController;
use App\Http\Controllers\AdminManagement;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\CashierAuth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InventoryArchiveController;
use App\Http\Controllers\ReceiptPDF;
    
use App\Livewire\InventoryArchive;


//superadmin
Route::get('/superadmin', function () {
    return view('superadmin/superadmin-login');
});
Route::get('/superadmin/user_management', function () {
    return view('superadmin/superadmin-user');
});
//admin
Route::get('/admin', function () {
    return view('admin/admin-login');
}); 

 

//cashier
Route::get('/cashier', function () {
    return view('cashier/cashier-login');
}); 

// Route::get('/cashier/pos', function () {
//     return view('cashier/pos');
// }); 

//customers
Route::get('/', function () {
    return view('index');
});
Route::get('/customize', function () {
    return view('customize');
});

Route::middleware([AdminAuth::class])->group(function() {
    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index'], function () {
        return view('admin/admin-home');
    });
    // Products Management
    Route::get('/admin/products', [ProductsController::class, 'display'])->name('products.display');
    Route::post('/admin/products/{id}', [ProductsController::class, 'update'])->name('products.update');


    // Sales Logs
    Route::get('/admin/sales', [AdminController::class, 'displayLogs'])->name('admin.logs');

    // User Management
    Route::get('/admin/user_management', [CashierManagement::class, 'display'])->name('cashier.display');
    Route::post('/admin/user_management', [CashierManagement::class, 'store'])->name('cashier.store');
    Route::post('/admin/user_management/{id}', [CashierManagement::class, 'update'])->name('cashier.update');
    Route::delete('/admin/user_management/{id}', [CashierManagement::class, 'destroy'])->name('cashier.destroy');

    // Announcements Management
    Route::get('/admin/announcements', [AnnouncementController::class, 'display'])->name('announcement.display');
    Route::post('/admin/announcements', [AnnouncementController::class, 'store'])->name('announcement.store');
    Route::put('/admin/announcements/{id}', [AnnouncementController::class, 'update'])->name('announcement.update');
    Route::delete('/admin/announcements/{id}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');

    // Inventory Management
    Route::get('/admin/inventory', [InventoryController::class, 'display'])->name('inventory.display');
    Route::get('/admin/inventory/archived', [InventoryArchiveController::class,'index'])->name('inventory.archived');
    Route::post('/admin/inventory', [InventoryController::class, 'store'])->name('inventory.store');
    Route::post('/admin/inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update');
    Route::delete('/admin/inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');
    Route::put('/admin/inventory', [InventoryController::class, 'setCriticalLevel'])->name('inventory.critical');
    Route::get('/inventory/export-pdf', [InventoryPdfController::class, 'exportToPdf'])->name('inventory.export');
    Route::get('/inventory/export-excel', [InventoryController::class, 'exportToExcel'])->name('inventory.exportToExcel');


});
//cashier auth routes
Route::middleware([CashierAuth::class])->group(function() {
    Route::get('/cashier/pos', [ProductsController::class, 'display'])->name('products.display');
    Route::post('/cashier/pos/{id}', [ProductsController::class, 'addToOrder'])->name('order.store');
    Route::get('/cashier/pos', [OrderController::class, 'display'])->name('order.display');
    Route::put('/cashier/pos/{id}', [OrderController::class, 'update'])->name('order.update');
    Route::delete('/cashier/pos/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
    Route::post('/cashier/pos', [OrderController::class, 'checkout'])->name('order.checkout');
    Route::get('/cashier/pos/receipt{id}', [ReceiptPDF::class, 'exportToPdf'])->name('order.receipt');
});
//cashier login and logout
Route::post('/cashier/login', [CashierManagement::class, 'login'])->name('cashier.login');
Route::get('/cashier/logout', [CashierManagement::class, 'logout'])->name('cashier.logout');

// super admin function store account admin
Route::post('/superadmin/user_management', [AdminManagement::class, 'store'])->name('admin.store');
Route::get('/superadmin/user_management', [AdminManagement::class, 'display'])->name('admin.display');
Route::post('/superadmin/user_management/{id}', [AdminManagement::class, 'update'])->name('admin.update');
Route::delete('/superadmin/user_management/{id}', [AdminManagement::class, 'destroy'])->name('admin.destroy');

// admin login and logout
Route::post('/admin/login', [AdminManagement::class, 'login'])->name('admin.login') ;
Route::get('/admin/logout', [AdminManagement::class, 'logout'])->name('admin.logout');


//customers
Route::get('/', [AnnouncementController::class, 'displayOnCustomers']);








