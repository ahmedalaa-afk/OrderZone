<?php

namespace App\Livewire\User\Products;

use App\Http\Traits\Filtering;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class WomenProducts extends Component
{
    use Filtering;
    public $products, $categories, $key;
    protected $listeners = ['filterProducts'];
    public function mount()
    {
        $this->categories = Category::where('name', 'like', '%women%')->get();

        $this->products = Product::whereHas('categories', function ($query) {
            $query->whereIn('name', $this->categories->pluck('name')->toArray());
        })->get();
    }
    public function filterProducts($key)
    {
        $this->key = $key;
        $this->products = Product::whereHas('categories', function ($query) use ($key) {
            $query->where('name', $key);
        })->get();
    }
    public function render()
    {
        return view('user.products.women-products', ['products' => $this->products, 'categories' => $this->categories]);
    }
}
