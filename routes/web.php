<?php

use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\WishListController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return to_route('login');
});


Route::prefix('user')->controller(HomeController::class)->name('user.')->group(function () {
    // User Pages
    Route::middleware(['auth'])->group(function () {
        Route::resource('/', HomeController::class);
        Route::get('/shop', 'shop')->name('shop');
        Route::controller(ProductController::class)->group(function () {
            Route::post('/products/filter',  'filterProducts')->name('filterProducts');
            Route::get('/categories/{category}',  'getCategoryProducts')->name('getCategoryProducts');
            Route::get('/department/{department}',  'getdepartmentProducts')->name('getdepartmentProducts');
            Route::get('/Tag/{tag}',  'getTagProducts')->name('getTagProducts');
        });
        Route::prefix('contact')->controller(ContactController::class)->group(function(){
            Route::post('/store', 'store')->name('contact.store');
            Route::get('/', 'contact')->name('contact');
        });
        Route::prefix('wishlist')->controller(WishListController::class)->group(function(){
            Route::get("wishlist",'index')->name('wishlist');;
            Route::post('/add/{id}', 'AddWithlist')->name('add');
            Route::post('/remove/{id}', 'RemoveWithlist')->name('remove');
        });
    });
});
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
