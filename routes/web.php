<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProfileController;
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
        Route::get('/getCategoryProducts/{category}', 'getCategoryProducts')->name('getCategoryProducts');
        Route::post('/getBrandProducts', [BrandController::class,'getBrandProducts'])->name('getBrandProducts');
        Route::get('/blog', 'blog')->name('blog');
        Route::get('/contact', 'contact')->name('contact');
    });
});
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';


