<?php

namespace App\Livewire\Admin\Sizes;

use App\Models\Size;
use Livewire\Component;

class SizesUpdate extends Component
{
    protected $listeners = ['editSize'];
    public $size, $name;
    public function editSize($id)
    {
        $this->size = Size::where('id',$id)->first();
        $this->name = $this->size->name;
        $this->dispatch('updateSize');
    }
    public function rules()
    {
        return [
            'size' => 'required|min:1|unique:sizes,size',
        ];
    }
    public function submit()
    {
        $this->size->update([
            'name' => $this->name,
        ]);
        $this->reset(['size']);
        $this->dispatch('updateSize');
        $this->dispatch('refreshSizes')->to(SizesData::class);
    }
    public function render()
    {
        return view('admin.sizes.sizes-update');
    }
}
