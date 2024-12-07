<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\WishlistController;
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
        Route::prefix('wishlist')->name('wishlist.')->controller(WishlistController::class)->group(function(){
            Route::get("/",'index')->name('index');
            Route::get('/add/{product_id}', 'AddToWishlist')->name('add');
            Route::get('/remove/{product_id}', 'RemoveFromWishlist')->name('remove');
        });
        Route::prefix('cart')->name('cart.')->controller(CartController::class)->group(function(){
            Route::get("/",'index')->name('index');
            Route::post('/add/{slug}', 'addToCart')->name('add');
            Route::post('/remove/{slug}', 'removeFromCart')->name('remove');
        });
        Route::prefix('checkout')->name('checkout.')->controller(CheckoutController::class)->group(function(){
            Route::get("/",'index')->name('index');
            Route::post("checkout/order",'checkout')->name('checkout');
        });
        Route::prefix('order')->name('order.')->controller(OrderController::class)->group(function(){
            Route::get("/",'index')->name('index');
            Route::get("/{id}/payment",'proccessPayment')->name('proccess.payment');
            Route::post("/{id}/cancel",'orderCancel')->name('cancel');
            Route::get("filter",'filterOrders')->name('filter');
        });
        Route::prefix('payment')->name('payment.')->controller(PaymentsController::class)->group(function(){
            Route::get("order/{order}/stripe/payment-intent",'createStripePaymentIntent')->name('stripe.paymentIntent.create');
            Route::get('success','StripePaymentSuccess')->name('stripe.paymentSuccess');
        });
    });
    
    Route::fallback('routeFallback');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
