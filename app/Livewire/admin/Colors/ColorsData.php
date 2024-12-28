<?php

namespace App\Livewire\Admin\Colors;

use App\Models\Color;
use Livewire\Component;

class ColorsData extends Component
{
    public $search,$showArchived = false;
    protected $listeners = ['refreshColors' => '$refresh','restoreColor'];
    public function UpdateingSearch(){
        $this->resetPage();
    }
    public function showArchivedColors()
    {
        if ($this->showArchived) {
            $this->showArchived = false;
        } else {
            $this->showArchived = true;
        }
    }
    public function restoreColor($id)
    {
        Color::where('id', $id)->restore();
    }
    
    public function render()
    {
        $query = $this->showArchived
            ? Color::onlyTrashed()
            : Color::query();

        $colors = $query
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('admin.colors.colors-data', compact('colors'));
    }
}
