<?php

namespace App\Livewire\Admin\Colors;

use App\Models\Color;
use Livewire\Component;

class ColorsData extends Component
{
    public $search;
    protected $listeners = ['refreshColors' => '$refresh'];
    public function UpdateingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $colors = Color::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('admin.colors.colors-data', compact('colors'));
    }
}
