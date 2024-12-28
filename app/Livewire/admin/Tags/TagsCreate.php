<?php

namespace App\Livewire\Admin\Tags;

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TagsCreate extends Component
{
    public $name;
    protected $listeners = ['createTag'];

    public function rules()
    {
        return [
            'name' => 'required|string|unique:tags,name',
        ];
    }
    public function submit()
    {
        $this->validate($this->rules());
        Tag::create([
            'name' => $this->name,
            'admin_id' => Auth::guard('admin')->user()->id,
        ]);
        $this->reset(['name']);
        $this->dispatch('createTag');
        $this->dispatch('refreshTags')->to(TagsData::class);
    }
    public function render()
    {
        return view('admin.tags.tags-create');
    }
}
