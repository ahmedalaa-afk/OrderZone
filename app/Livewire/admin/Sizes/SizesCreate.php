<?php

namespace App\Livewire\Admin\Sizes;

use App\Models\Size;
use Livewire\Component;

class SizesCreate extends Component
{
    public $size;
    protected $listeners = ['createSize'];

    public function rules()
    {
        return [
            'size' => 'required|string|min:1|max:2|unique:sizes,size',
        ];
    }
    public function submit()
    {
        $this->validate($this->rules());
        Size::create([
            'size' => $this->size,
        ]);
        $this->reset(['size']);
        $this->dispatch('createSize');
        $this->dispatch('refreshSizes')->to(SizesData::class);
    }
    public function render()
    {
        return view('admin.sizes.sizes-create');
    }
}
