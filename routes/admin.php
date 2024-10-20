<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Supporter\ZoomMeeting;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return to_route('login');
// });


Route::prefix('admin')->controller(AdminController::class)->name('admin.')->group(function () {
    // Admin Pages
    Route::get('/','index')->name('index');
    Route::get('/settings','settings')->name('settings');
    // User Manager Routes
    Route::get('/users','users')->name('users');
    // Vendor Manager Routes
    Route::get('/vendors','vendors')->name('vendors');
    Route::get('/notifications','notifications')->name('notifications');
    Route::get('/categories','categories')->name('categories');
    // Product Manager Routes
    Route::get('/products','products')->name('products');

    
    // Authentication Routes
    require __DIR__ . '/adminAuth.php';
})->middleware('admin');



// Route::middleware(['admin'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });