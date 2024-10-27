<?php

namespace App\Livewire\Vendor\Products;

use App\Models\Product;
use Livewire\Component;

class DiscountsCreate extends Component
{
    public $product, $amount, $start_at, $end_at;
    protected $listeners = ['productDiscount'];
    public function rules()
    {
        return [
            'amount' => 'required|numeric',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
        ];
    }
    public function productDiscount($slug)
    {
        $this->product = Product::where('slug', $slug)->first();
        $this->dispatch('createDiscountModal');
    }
    public function submit() {}
    public function render()
    {
        return view('vendor.products.discounts-create');
    }
}
