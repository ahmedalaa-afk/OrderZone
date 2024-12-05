<?php

namespace App\Livewire\User\Products;

use App\Http\Traits\Filtering;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class MenProducts extends Component
{
    use Filtering;
    public $products, $categories, $key = 'men';
    protected $listeners = ['filterProducts'];
    public function mount()
    {
        $this->categories = Category::where('name', 'like', 'men%')->get();

        $this->products = Product::whereHas('categories', function ($query) {
            $query->where('status','accepted')->whereIn('name', $this->categories->pluck('name')->toArray());
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
    public function render()
    {
        return view('user.products.men-products', [
            'products' => $this->products,
            'categories' => $this->categories
        ]);
    }
}
