<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware(['auth', 'checkUserStatus']);
    }
    public function getBrandProducts(Request $request)
    {
        // Use an empty array as the default value to avoid undefined errors
        $selectedBrandNames = $request->input('brands', []);

        if(!empty($selectedBrandNames)){
            // Fetch products based on selected brand names
            $products = Product::whereHas('brands', function ($query) use ($selectedBrandNames) {
                $query->whereIn('name', $selectedBrandNames);
            })->get();
    
            // Fetch all brands for the checkbox list
            $brands = Brand::all();
    
            // Get total cart price
            $total = $this->cartService->getToalCartPrice();
        }
        else{
            // If no brand names are selected, return to the shop page
            return redirect()->route('user.shop');
        }

        // Explicitly pass the variable with a default value if not set
        return view('user.shop', [
            'brands' => $brands,
            'products' => $products,
            'total' => $total,
            'selectedBrandNames' => $selectedBrandNames ?? [], // Default to an empty array
        ]);
    }
}
