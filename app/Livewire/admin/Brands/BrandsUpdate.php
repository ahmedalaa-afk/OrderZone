<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;

class BrandsUpdate extends Component
{
    public $name, $brand;
    protected $listeners = ['editBrand'];

    public function rules()
    {
        return [
            'name' => 'required|string|unique:brands,name',
        ];
    }
    public function editBrand($id){
        $this->brand = Brand::where('id',$id)->first();
        $this->name = $this->brand->name;
        $this->dispatch('updateBrand');
    }
    public function submit()
    {
        $this->validate($this->rules());
        $this->brand->update([
            'name' => $this->name,
        ]);
        $this->reset(['name']);
        $this->dispatch('updateBrand');
        $this->dispatch('refreshBrands')->to(BrandsData::class);
    }
    public function render()
    {
        return view('admin.brands.brands-update');
    }
}
