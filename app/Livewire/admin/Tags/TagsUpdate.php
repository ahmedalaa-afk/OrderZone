<?php

namespace App\Livewire\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;

class TagsUpdate extends Component
{
    public $name,$tag;
    protected $listeners = ['editTag'];

    public function rules()
    {
        return [
            'name' => 'required|string|unique:tags,name',
        ];
    }
    public function editTag($id)
     {
        $this->tag = Tag::find($id);
        $this->name = $this->tag->name;
        $this->dispatch('updateTag');

    }
    public function submit()
    {
        $this->validate($this->rules());
        $this->tag->update([
            'name' => $this->name,
        ]);
        $this->reset(['name']);
        $this->dispatch('updateTag');
        $this->dispatch('refreshTags')->to(TagsData::class);
    }
    public function render()
    {
        return view('admin.tags.tags-update');
    }
}
