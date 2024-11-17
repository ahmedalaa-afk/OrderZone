<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $wishlists = WishList::where('user_id', auth()->user()->id)->get();
        dd($wishlists);
        return view('user.wishlist', compact('wishlists'));
    }

    public function AddWithlist(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $user = Auth::user();

        // Ensure the user has a wishlist
        $wishlist = $user->wishlist ?? $user->wishlist()->create();

        $product = Product::findOrFail($request->product_id);

        // Attach the product to the user's wishlist
        $wishlist->products()->syncWithoutDetaching($product->id);

        return to_route('user.wishlist')->with('success','Product added to wishlist successfully!');
    }
}
