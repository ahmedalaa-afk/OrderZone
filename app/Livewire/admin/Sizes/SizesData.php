<?php

namespace App\Livewire\Admin\Sizes;

use App\Models\Size;
use Livewire\Component;

class SizesData extends Component
{
    public $search;
    protected $listeners = ['refreshSizes' => '$refresh'];
    public function UpdateingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $sizes = Size::where('size', 'like', '%' . $this->search . '%')->paginate(10);
        return view('admin.sizes.sizes-data', compact('sizes'));
    }
}
