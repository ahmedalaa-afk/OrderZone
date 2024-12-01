<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
        $orders = Auth::user()->orders()->paginate(4);
        return view('user.order', compact('total', 'orders'));
    }

    public function orderCancel($id)
    {
        $order = Auth::user()->orders()->find($id);
        if ($order) {
            $order->status = 'cancelled';
            $order->save();
            return redirect()->route('user.order.index')->with('success', 'Order cancelled successfully');
        }
        return redirect()->route('user.order.index')->with('error', 'Failed to cancel the order');
    }

    public function filterOrders(Request $request)
    {
        if ($request->status == 'all') {
            return to_route('user.order.index');
        }
        $orders = Auth::user()->orders()->where('status', $request->status)->cursorPaginate(4);
        $total = $this->cartService->getToalCartPrice();
        return view('user.order', compact('total', 'orders'));
    }
    public function proccessPayment($id)
    {
        $order = Auth::user()->orders()->find($id);
        if ($order) {
            return to_route('user.payment.stripe.paymentIntent.create',compact('order'));
        }
        return redirect()->route('user.order.index')->with('error', 'Failed to get order details');
    }
}