<?php

namespace App\Livewire\Admin\Sizes;

use App\Models\Product;
use App\Models\Size;
use Livewire\Component;

class SizesDelete extends Component
{
    protected $listeners=['deleteSize'];
    public $size;
    public function deleteSize($id){
        $this->size = Size::where('id', $id)->first();
        $this->dispatch('deleteSizeModal');
    }
    public function submit(){
        $products = Product::whereHas('size',function($query){
            $query->where('size_id',$this->size->id);
        });
        foreach($products as $product){
            $product->size_id = null;
            $product->save();
        }
        $this->size->delete();
        $this->reset('size');
        $this->dispatch('deleteSizeModal');
        $this->dispatch('refreshSizes')->to(SizesData::class);
    }
    public function render()
    {
        return view('admin.sizes.sizes-delete');
    }
}
