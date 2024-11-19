<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\WishList;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{

    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware(['auth', 'checkUserStatus']);
    }
    public function index()
    {
        $wishlists = WishList::where('user_id', auth()->user()->id)->get();
        $total = $this->cartService->getToalCartPrice();

        return view('user.wishlist', compact('wishlists', 'total'));
    }

    public function AddToWishlist($product_id)
    {
        $user = Auth::user();
        $wishlist = $user->wishlist ?? $user->wishlist()->create();

        $product = Product::where('id', $product_id)->first();

        if ($product) {

            $wishlist->products()->attach($product->id);
            return to_route('user.wishlist')->with('success', 'Product added to wishlist successfully!');
        }
    }
}
