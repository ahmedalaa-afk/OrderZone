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
    public function submit() {
        $this->validate();
        // Create discount record for the product
        $discount = $this->product->discount()->create([
            'amount' => $this->amount,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'product_slug' => $this->product->slug
        ]);
        $this->product->total = $this->product->price - $discount->amount;
        $this->product->save();

        $this->reset(['amount','start_at','end_at']);
        $this->dispatch('createDiscountModal');
        $this->dispatch('refreshProducts');


    }
    public function render()
    {
        return view('vendor.products.discounts-create');
    }
}
