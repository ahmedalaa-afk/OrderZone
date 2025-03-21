<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware(['auth', 'checkUserStatus']);
    }

    public function index()
    {
        $total = $this->cartService->getToalCartPrice();
        $products = Auth::user()->cart->products;
        return view('user.cart', compact('total', 'products'));
    }
    public function addToCart($slug)
    {
        $user = Auth::user();

        $cart = $user->cart;

        if (!$cart) {
            return back()->with('error', 'Cart not found.');
        }

        $product = Product::where('slug', $slug)->first();

        if (!$product) {
            return back()->with('error', 'Product not found.');
        }

        $existingProduct = $cart->products()
            ->where('product_id', $product->id)
            ->first();

        if ($existingProduct) {
            $cart->products()->updateExistingPivot($product->id, [
                'quantity' => $existingProduct->pivot->quantity + 1
            ]);
            return to_route('user.cart.index')->with('success', 'Product quantity updated in your cart.');
        }

        $cart->products()->attach($product->id, ['quantity' => 1]);
        return to_route('user.cart.index')->with('success', 'Product added to your cart.');
    }

    public function removeFromCart($slug)
    {
        $user = Auth::user();
        $cart = $user->cart;

        if (!$cart) {
            return back()->with('error', 'Cart not found.');
        }

        $product = Product::where('slug', $slug)->first();

        if (!$product) {
            return back()->with('error', 'Product not found.');
        }

        $existingProduct = $cart->products()->where('product_id', $product->id)->first();

        if ($existingProduct) {
            $newQuantity = $existingProduct->pivot->quantity - 1;

            if ($newQuantity > 0) {
                // Update quantity if it's greater than zero
                $cart->products()->updateExistingPivot($product->id, [
                    'quantity' => $newQuantity
                ]);
                return to_route('user.cart.index')->with('success', 'Product quantity updated in your cart.');
            } else {
                // Remove product from cart if quantity reaches zero
                $cart->products()->detach($product->id);
                return to_route('user.cart.index')->with('success', 'Product removed from your cart.');
            }
        }

        return back()->with('error', 'Product not found in your cart.');
    }
}
