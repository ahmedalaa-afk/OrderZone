<?php

namespace App\Livewire\Admin\Sizes;

use App\Models\Size;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SizesCreate extends Component
{
    public $name;
    protected $listeners = ['createSize'];

    public function rules()
    {
        return [
            'name' => 'required|string|min:1|max:2|unique:sizes,name',
        ];
    }
    public function submit()
    {
        $this->validate($this->rules());
        Size::create([
            'name' => $this->name,
            'admin_id' => Auth::guard('admin')->user()->id,
        ]);
        $this->reset(['name']);
        $this->dispatch('createSize');
        $this->dispatch('refreshSizes')->to(SizesData::class);
    }
    public function render()
    {
        return view('admin.sizes.sizes-create');
    }
}
