<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
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
        return view('user.checkout', compact('total', 'products'));
    }

    public function checkout(CheckoutRequest $request)
    {
        $user = Auth::user();

        $total = $this->cartService->getToalCartPrice();

        $products = $user->cart->products;

        $order = $user->orders()->create([
            'total' => $total,
        ]);

        foreach ($products as $product) {
            $order->products()->attach($product->id, [
                'quantity' => $product->pivot->quantity,
                'price' => $product->total,
            ]);
        }

        $user = auth()->user();
        $user->cart->clearCart();


        return to_route('user.payment.stripe.paymentIntent.create', compact('order'));
    }
}
