<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\CartService;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware(['auth', 'checkUserStatus']);
    }

    public function createStripePaymentIntent(Order $order)
    {
        $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));
        $session = $stripe->checkout->sessions->create([
            'success_url' => 'http://orderzone.com:8080/user/payment/success',
            'cancel_url' => 'https://example.com/cancel',
            'line_items' => $order->products->map(function ($product) {
                return [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $product->title,
                            'images' => [$product->photos->first()->photo],
                        ],
                        'unit_amount' => $product->pivot->price * 100,
                    ],
                    'quantity' => $product->pivot->quantity,
                ];
            })->toArray(),

            'mode' => 'payment',

        ]);

        return redirect($session->url);
    }

    public function StripePaymentSuccess(){
        $total = $this->cartService->getToalCartPrice();
        return view('user.payments_success',compact('total'));
    }
}
