<?php

namespace App\Livewire\Admin\Colors;

use App\Models\Color;
use Livewire\Component;

class ColorsUpdate extends Component
{
    public $name, $color;
    protected $listeners = ['editColor'];

    public function rules()
    {
        return [
            'name' => 'required|string|unique:colors,name',
        ];
    }
    public function editColor($id)
    {
        $this->color = Color::find($id);
        $this->name = $this->color->name;
        $this->dispatch('updateColor');
    }
    public function submit()
    {
        $this->validate($this->rules());
        $this->color->update([
            'name' => $this->name,
        ]);
        $this->reset(['name']);
        $this->dispatch('updateColor');
        $this->dispatch('refreshColors')->to(ColorsData::class);
    }
    public function render()
    {
        return view('admin.colors.colors-update');
    }
}
