<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;

class CartService{
    public function getToalCartPrice(){
        $total=0;
        $carts = Auth::user()->carts;
        if($carts){
            foreach($carts as $cart){
                $total+=$cart->product->total;
            }
            return $total;
        }
    }
}