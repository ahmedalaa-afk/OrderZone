<?php

namespace App\Livewire\Admin\Colors;

use App\Models\Color;
use Livewire\Component;

class ColorsCreate extends Component
{
    public $color;
    protected $listeners = ['createColor'];

    public function rules()
    {
        return [
            'color' => 'required|string|unique:colors,color',
        ];
    }
    public function submit()
    {
        $this->validate($this->rules());
        Color::create([
            'color' => $this->name,
        ]);
        $this->reset(['name']);
        $this->dispatch('createBrand');
        $this->dispatch('refresColors')->to(ColorsData::class);
    }
    public function render()
    {
        return view('admin.colors.colors-create', ['color' => Color::all()]);
    }
}
