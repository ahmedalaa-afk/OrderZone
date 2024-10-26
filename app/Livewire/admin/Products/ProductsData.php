<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use App\Notifications\ProductAcceptedNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsData extends Component
{
    use WithPagination;
    protected $listeners = ['changeStatus', 'refreshProducts' => '$refresh', 'sortProducts'];
    public $search, $key;
    public function mount()
    {
        $this->key == '' ? $this->key = 'created_at' : $this->key;
        Auth::guard('admin')->user()->notifications->markAsRead();
    }
    public function sortProducts($key)
    {
        $this->key = $key;
    }
    public function changeStatus($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->status = 'accepted';
        $this->dispatch('refreshProducts')->to(ProductsData::class);
        $product->save();
        // Send notification to vendor
        Notification::send($product->vendor, new ProductAcceptedNotification());
    }
    public function UpdatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $products = Product::where('title', 'like', '%' . $this->search . '%')
        ->where('status', '!=', 'accepted')
        ->orderBy($this->key, 'asc')->paginate(10);

        return view('admin.products.products-data', [
            'products' => $products
        ]);
    }
}
