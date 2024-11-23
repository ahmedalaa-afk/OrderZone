<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class CartService
{
    public function getToalCartPrice()
    {
        $total = 0;

        $cart = Auth::user()->cart;

        if ($cart) {
            foreach ($cart->products as $product) {
                $total += $product->price * $product->pivot->quantity;
            }
        }

        return $total;
    }
}
