<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return to_route('login');
// });


Route::prefix('vendor')->controller(VendorController::class)->name('vendor.')->group(function () {
    // Vendor Pages
    Route::get('/','index')->name('index');
    Route::get('/request','request')->name('request');
    // Product Section
    Route::prefix('product')->controller(ProductController::class)->name('product.')->group(function () {
        Route::resource('/',ProductController::class);
    });
    // notifications Section
    Route::get('/notifications','notifications')->name('notifications');
    // Authentication Routes
    require __DIR__ . '/vendorAuth.php';
});



// Route::middleware(['admin'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });