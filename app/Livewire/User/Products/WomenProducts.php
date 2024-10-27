<?php

namespace App\Livewire\User\Products;

use App\Http\Traits\Filtering;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WomenProducts extends Component
{
    use Filtering;
    public $products, $categories, $key = 'women';
    protected $listeners = ['filterProducts', 'addToCart'];
    public function mount()
    {
        $this->categories = Category::where('name', 'like', 'women%')->get();

        $this->products = Product::whereHas('categories', function ($query) {
            $query->whereIn('name', $this->categories->pluck('name'));
        })->get();        
    }
    public function filterProducts($key)
    {
        $this->key = $key;
    }
    public function updatedKey()
    {
        $this->products = $this->getCategoryProducts($this->key);
    }
    public function addToCart($slug)
    {

        $user = Auth::user();
        $product = Product::where('slug', $slug)->first();
        // Add product to cart...
        if ($product) {
            $product_exist = Cart::where('product_slug', $product->slug)->first();
            if ($product_exist) {
                $product_exist->quantity += 1;
                $product_exist->save();
            } else {

                Cart::create([
                    'product_slug' => $product->slug,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
    public function render()
    {
        return view('user.products.women-products', [
            'products' => $this->products,
            'categories' => $this->categories
        ]);
    }
}
