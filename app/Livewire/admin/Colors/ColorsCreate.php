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
            'color' => $this->color,
        ]);
        $this->reset(['color']);
        $this->dispatch('createColor');
        $this->dispatch('refresColors')->to(ColorsData::class);
    }
    public function render()
    {
        return view('admin.colors.colors-create');
    }
}
