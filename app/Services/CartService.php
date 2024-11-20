<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class CartService
{
    public function getToalCartPrice()
    {
        $total = 0;

        // Access the cart for the authenticated user
        $cart = Auth::user()->cart;

        if ($cart) {
            // Loop through the products in the cart
            foreach ($cart->products as $product) {
                // Use the product's price and quantity from the pivot table
                $total += $product->price * $product->pivot->quantity;
            }
        }

        return $total;
    }
}
