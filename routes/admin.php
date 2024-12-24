<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserManagerController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return to_route('login');
// });


Route::prefix('admin')->controller(AdminController::class)->name('admin.')->group(function () {
    // Admin Pages
    Route::get('/', 'index')->name('index');
    Route::get('/settings', 'settings')->name('settings');
    // User Manager Routes
    Route::controller(UserManagerController::class)->group(function () {
        Route::get('/users', 'users')->name('users');
        Route::get('/user/contacts', 'userContacts')->name('userContacts');
    });
    // Vendor Manager Routes
    Route::get('/vendors', 'vendors')->name('vendors');
    Route::get('/notifications', 'notifications')->name('notifications');
    Route::get('/announcements', 'vendorsAnnouncement')->name('announcements');
    // Product Manager Routes
    Route::get('/products', 'products')->name('products');
    Route::get('/categories', 'categories')->name('categories');
    Route::get('/departments', 'departments')->name('departments');
    Route::get('/brands', 'brands')->name('brands');
    Route::get('/colors', 'colors')->name('colors');
    Route::get('/sizes', 'sizes')->name('sizes');
    Route::get('/tags', 'tags')->name('tags');

    // Authentication Routes
    require __DIR__ . '/adminAuth.php';

    // Profile Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    });
})->middleware('admin');