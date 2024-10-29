<?php

namespace App\Livewire\Vendor\Products;

use App\Models\Product;
use Livewire\Component;

class DiscountsCreate extends Component
{
    public $product, $amount, $start_at, $end_at, $type;
    protected $listeners = ['productDiscount'];
    public function rules()
    {
        return [
            'amount' => 'required|numeric',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'type' => 'nullable|in:product,weekly'
        ];
    }

    public function productDiscount($slug)
    {
        $this->product = Product::where('slug', $slug)->first();
        $this->dispatch('createDiscountModal');
    }
    public function submit()
    {
        $this->validate();
        // check if discount amount bigger than product price
        if ($this->amount > $this->product->price) {
            session()->flash('status', 'The discount amount cannot exceed the product price.');
            return;
        }

        // Create discount record for the product
        $discount = $this->product->discounts()->create([
            'amount' => $this->amount,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
            'type' => $this->type,
        ]);
        $this->product->total = $this->product->price - $discount->amount;
        $this->product->save();

        $this->reset(['amount', 'start_at', 'end_at']);
        $this->dispatch('createDiscountModal');
        $this->dispatch('refreshProducts');
    }
    public function render()
    {
        return view('vendor.products.discounts-create');
    }
}
