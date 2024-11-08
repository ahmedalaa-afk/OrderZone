<?php

use App\Http\Controllers\Admin\AdminController;
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
    Route::get('/announcements','vendorsAnnouncement')->name('announcements');
    // Product Manager Routes
    Route::get('/products','products')->name('products');
    Route::get('/categories','categories')->name('categories');
    Route::get('/departments','departments')->name('departments');
    Route::get('/brands','brands')->name('brands');
    Route::get('/colors','colors')->name('colors');
    Route::get('/sizes','sizes')->name('sizes');

    
    // Authentication Routes
    require __DIR__ . '/adminAuth.php';
})->middleware('admin');



// Route::middleware(['admin'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });