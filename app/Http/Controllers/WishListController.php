<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\WishList;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware(['auth', 'checkUserStatus']);
    }
    public function index()
    {
        $products = Auth::user()->wishlist->products;
        $total = $this->cartService->getToalCartPrice();

        return view('user.wishlist', compact('products', 'total'));
    }

    public function AddToWishlist($product_id)
    {
        $user = Auth::user();
        $wishlist = $user->wishlist ?? $user->wishlist()->create();

        $product = Product::where('id', $product_id)->first();

        if ($user->wishlist->products->contains($product->id)) {
            $products = Auth::user()->wishlist->products;
            $total = $this->cartService->getToalCartPrice();

            return to_route('user.wishlist.index', compact('products', 'total'))->with('error', 'Product already in wishlist!');
        }
        else {

            $wishlist->products()->attach($product->id);
            return to_route('user.wishlist.index', compact('products'))->with('success', 'Product added to wishlist successfully!');
        }
    }
}