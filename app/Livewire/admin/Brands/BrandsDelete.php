<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;

class BrandsDelete extends Component
{
    protected $listeners=['deleteBrand'];
    public $brand;
    public function deleteBrand($id){
        $this->brand = Brand::where('id', $id)->first();
        $this->dispatch('deleteBrandModal');
    }
    public function submit(){
        $this->brand->delete();
        $this->reset('brand');
        $this->dispatch('deleteBrandModal');
        $this->dispatch('refreshBrands')->to(BrandsData::class);
    }
    public function render()
    {
        return view('admin.brands.brands-delete');
    }
}
