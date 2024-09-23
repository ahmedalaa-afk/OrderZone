<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use App\Notifications\ProductAcceptedNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class ProductsDetails extends Component
{
    protected $listeners = ['productDetails', 'acceptProduct', 'rejectProduct'];
    public $product;
    public function productDetails($slug)
    {
        $this->product = Product::where('slug', $slug)->first();
        $this->dispatch('showProductModal');
    }
    public function acceptProduct()
    {
        $this->product->status = 'accepted';
        $this->product->save();
        $this->dispatch('showProductModal');
        $this->dispatch('refreshProducts')->to(ProductsData::class);
        // Send notification to vendor
        Notification::send($this->product->vendor, new ProductAcceptedNotification());
    }
    public function rejectProduct()
    {
        $this->product->status = 'not_accepted';

        $this->product->save();
        $this->dispatch('showProductModal');
        $this->dispatch('refreshProducts')->to(ProductsData::class);
    }
    public function render()
    {
        return view('admin.products.products-details', ['product' => $this->product]);
    }
}
