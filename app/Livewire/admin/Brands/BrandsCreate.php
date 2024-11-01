<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;

class BrandsCreate extends Component
{
    public $name;
    protected $listeners = ['createBrand'];

    public function rules()
    {
        return [
            'name' => 'required|string|unique:brands,name',
        ];
    }
    public function submit()
    {
        $this->validate($this->rules());
        Brand::create([
            'name' => $this->name,
        ]);
        $this->reset(['name']);
        $this->dispatch('createBrand');
        $this->dispatch('refreshBrands')->to(BrandsData::class);
    }
    public function render()
    {
        return view('admin.brands.brands-create', ['brands' => Brand::all()]);
    }
}
