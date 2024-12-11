<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\Filtering;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    use Filtering;
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware(['checkUserStatus']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::whereHas('discount')->where('status','accepted')->first();
        $total = $this->cartService->getToalCartPrice();
        return view('user.index', compact('product', 'total'));
    }

    public function shop()
    {
        $products = Product::where('status','accepted')->get();
        $colors = Color::all();
        $total = $this->cartService->getToalCartPrice();
        return view('user.shop', compact('total', 'products','colors'));
    }
    public function routeFallback(){
        $total = $this->cartService->getToalCartPrice();
        return view('user.fallback',compact('total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
