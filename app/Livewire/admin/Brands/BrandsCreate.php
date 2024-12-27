<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
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
            'admin_id' => Auth::guard('admin')->user()->id,
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
