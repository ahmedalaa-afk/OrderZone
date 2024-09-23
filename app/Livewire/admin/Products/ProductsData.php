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
        // Send notification to vendor
        Notification::send($product->vendor, new ProductAcceptedNotification());
        $this->dispatch('refreshProducts')->to(ProductsData::class);
        $product->save();
    }
    public function UpdatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('admin.products.products-data', [
            'products' => Product::where('title', 'like', '%' . $this->search . '%')
                ->where('status', '!=', 'accepted')
                ->orderBy($this->key, 'asc')->paginate(10)
        ]);
    }
}
