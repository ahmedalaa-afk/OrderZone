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

        // Retrieve the user's cart
        $cart = $user->cart;

        // Ensure the user has a cart
        if (!$cart) {
            return back()->with('error', 'Cart not found.');
        }

        // Find the product by slug
        $product = Product::where('slug', $slug)->first();

        // Ensure the product exists
        if (!$product) {
            return back()->with('error', 'Product not found.');
        }

        // Check if the product is already in the cart
        $existingProduct = $cart->products()
            ->where('product_id', $product->id)
            ->first();

        if ($existingProduct) {
            // Update the quantity if the product already exists
            $cart->products()->updateExistingPivot($product->id, [
                'quantity' => $existingProduct->pivot->quantity + 1
            ]);
            return to_route('user.cart.index')->with('success', 'Product quantity updated in your cart.');
        }

        // Add the product to the cart with a default quantity of 1
        $cart->products()->attach($product->id, ['quantity' => 1]);
        return to_route('user.cart.index')->with('success', 'Product added to your cart.');
    }
}
