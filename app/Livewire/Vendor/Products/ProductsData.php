<?php

namespace App\Livewire\Vendor\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsData extends Component
{
    use WithPagination;
    protected $listeners = ['refreshProducts' => '$refresh','deleteProduct','editProduct'];
    public $search;

    public function UpdatingSearch()
    {
        $this->resetPage();
    }
    public function deleteProduct($slug){
        $product = Product::where('slug', $slug)->first();
        $product->photos()->delete();
        $product->delete();
        $this->dispatch('refreshProducts');
    }
    public function editProduct($slug){
        $this->dispatch('editProductModal',['slug' => $slug]);
    }

    public function render()
    {
        $products = Product::where('status', 'accepted')
            ->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view(
            'vendor.products.products-data',
            [
                'products' => $products
            ]
        );
    }
}
