<?php

namespace App\Livewire\Admin\Colors;

use App\Models\Color;
use Livewire\Component;

class ColorsDelete extends Component
{
    protected $listeners =['deleteColor'];
    public $name, $color;

    public function deleteColor($id){
        $this->color = Color::where('id', $id)->first();
        $this->dispatch('deleteColorModal');
    }
    public function submit(){
        $this->color->delete();
        $this->reset(['name']);
        $this->dispatch('deleteColorModal');
        $this->dispatch('refreshColors')->to(ColorsData::class);
    }
    public function render()
    {
        return view('admin.colors.colors-delete');
    }
}
