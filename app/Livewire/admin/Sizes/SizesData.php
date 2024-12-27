<?php

namespace App\Livewire\Admin\Sizes;

use App\Models\Size;
use Livewire\Component;

class SizesData extends Component
{
    public $search,$showArchived=false;
    protected $listeners = ['refreshSizes' => '$refresh','restoreSize'];
    public function UpdateingSearch(){
        $this->resetPage();
    }
    public function showArchivedSizes()
    {
        if ($this->showArchived) {
            $this->showArchived = false;
        } else {
            $this->showArchived = true;
        }
    }
    public function restoreSize($id)
    {
        Size::where('id', $id)->restore();
    }
    public function deleteSize($id){
        dd($id);
    }
    public function render()
    {
        $query = $this->showArchived
            ? Size::onlyTrashed()
            : Size::query();

        $sizes = $query
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('admin.sizes.sizes-data', compact('sizes'));
    }
}
