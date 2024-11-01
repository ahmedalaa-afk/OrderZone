<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Traits\Filtering;
use App\Models\Category;
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
        $this->middleware(['auth', 'checkUserStatus']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::whereHas('discounts')->first();
        $total = $this->cartService->getToalCartPrice();
        return view('user.index', compact('product', 'total'));
    }

    public function shop()
    {
        $products = Product::all();
        $categories = Category::all();
        $total = $this->cartService->getToalCartPrice();
        return view('user.shop', compact('total', 'products', 'categories'));
    }
    public function getCategoryProducts($key)
    {
        if ($key == 'all') {

            $products = Product::all();
        } else {

            $categories = Category::where('name', 'like', $key . '%')->get();

            $products = Product::whereHas('categories', function ($query) use ($categories) {
                $query->whereIn('name', $categories->pluck('name')->toArray());
            })->get();
        }

        $total = $this->cartService->getToalCartPrice();

        return view('user.shop', compact('total', 'products'));
    }
    public function blog()
    {
        return view('user.blog');
    }
    public function contact()
    {
        return view('user.contact');
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
