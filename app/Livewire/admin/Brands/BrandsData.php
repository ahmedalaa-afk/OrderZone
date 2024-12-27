<?php

namespace App\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandsData extends Component
{
    use WithPagination;
    public $listeners = ['refreshBrands' => '$refresh','restoreBrand'];
    public $search, $showArchived = false;
    public function UpdatingSearch()
    {
        $this->resetPage();
    }
    public function showArchivedBrands()
    {
        if ($this->showArchived) {
            $this->showArchived = false;
        } else {
            $this->showArchived = true;
        }
    }
    public function restoreBrand($id)
    {
        Brand::where('id', $id)->restore();
    }
    public function render()
    {
        $query = $this->showArchived
            ? Brand::onlyTrashed()
            : Brand::query();

        $brands = $query
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('admin.brands.brands-data', compact('brands'));
    }
}
