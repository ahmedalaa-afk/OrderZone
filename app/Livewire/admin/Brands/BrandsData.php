<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandsData extends Component
{
    use WithPagination;
    public $listeners = ['refreshBrands' => '$refresh'];
    public $search;
    public function UpdatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $brands = Brand::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('admin.brands.brands-data', compact('brands'));
    }
}
