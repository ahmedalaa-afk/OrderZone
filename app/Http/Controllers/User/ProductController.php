<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware(['auth', 'checkUserStatus']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    public function filterProducts(Request $request)
    {
        $minamount = $request->get('minamount');
        $maxamount = $request->get('maxamount');

        $minamount = (float) str_replace(['$', ','], '', $minamount);
        $maxamount = (float) str_replace(['$', ','], '', $maxamount);

        $selectedBrandNames = $request->input('brands', []);
        $selectedColor = $request->input('color');
        $selectedSize = $request->input('size');
        $selectedTag = $request->input('tag');

        $query = Product::query();

        $query->whereBetween('total', [$minamount, $maxamount]);

        if (!empty($selectedBrandNames)) {
            $query->whereHas('brands', function ($query) use ($selectedBrandNames) {
                $query->whereIn('name', $selectedBrandNames);
            });
        }
        if (!empty($request->input('color'))) {
            $query->whereHas('color', function ($query) use ($selectedColor) {
                $query->where('color', $selectedColor);
            });
        }
        if (!empty($request->input('size'))) {
            $query->whereHas('size', function ($query) use ($selectedSize) {
                $query->where('size', $selectedSize);
            });
        }



        $products = $query->get();

        $brands = Brand::all();
        $colors = Color::all();

        $total = $this->cartService->getToalCartPrice();

        return view('user.shop', [
            'products' => $products,
            'total' => $total,
            'selectedBrandNames' => $selectedBrandNames,
            'minamount' => $minamount,
            'maxamount' => $maxamount
        ]);
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

    public function getdepartmentProducts($key)
    {
        if ($key == 'all') {

            $products = Product::all();
        } else {

            $categories = Category::whereHas('department', function ($query) use ($key) {
                $query->where('name', $key);
            })->get();

            $products = Product::whereHas('categories', function ($query) use ($categories) {
                $query->whereIn('name', $categories->pluck('name')->toArray());
            })->get();
        }
        $total = $this->cartService->getToalCartPrice();

        return view('user.shop', compact('total', 'products'));
    }

    public function getTagProducts($key)
    {
        $products = Product::whereHas('tag', function ($query) use ($key) {
            $query->where('tag', $key);
        })->get();
        $total = $this->cartService->getToalCartPrice();

        return view('user.shop', compact('total', 'products'));
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
