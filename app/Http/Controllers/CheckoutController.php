<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware(['auth', 'checkUserStatus']);
    }

    public function index(){
        $products = Auth::user()->cart->products;
        $total = $this->cartService->getToalCartPrice();
        return view('user.checkout',compact('total','products'));
    }
}
