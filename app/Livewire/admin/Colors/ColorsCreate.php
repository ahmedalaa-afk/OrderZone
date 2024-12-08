<?php

namespace App\Livewire\Admin\Colors;

use App\Models\Color;
use Livewire\Component;

class ColorsCreate extends Component
{
    public $name;
    protected $listeners = ['createColor'];

    public function rules()
    {
        return [
            'name' => 'required|string|unique:colors,name',
        ];
    }
    public function submit()
    {
        $this->validate($this->rules());
        Color::create([
            'name' => $this->name,
        ]);
        $this->reset(['name']);
        $this->dispatch('createColor');
        $this->dispatch('refresColors')->to(ColorsData::class);
    }
    public function render()
    {
        return view('admin.colors.colors-create');
    }
}
