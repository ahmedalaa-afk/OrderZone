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

        $this->products = Product::whereHas('category', function ($query) {
            $query->whereIn('name', $this->categories->pluck('name'))->where('status','accepted');
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

        // Find the product by slug
        $product = Product::where('slug', $slug)->first();

        if (!$product) {
            return to_route('user.cart.index');
        }

        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        $existingProduct = $cart->products()->where('product_id', $product->id)->first();

        if ($existingProduct) {
            $cart->products()->updateExistingPivot($product->id, [
                'quantity' => $existingProduct->pivot->quantity + 1,
            ]);
        } else {
            $cart->products()->attach($product->id, ['quantity' => 1]);
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
