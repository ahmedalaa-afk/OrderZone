<?php

namespace App\Livewire\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;

class TagsCreate extends Component
{
    public $tag;
    protected $listeners = ['createTag'];

    public function rules()
    {
        return [
            'tag' => 'required|string|unique:tags,tag',
        ];
    }
    public function submit()
    {
        $this->validate($this->rules());
        Tag::create([
            'tag' => $this->tag,
        ]);
        $this->reset(['tag']);
        $this->dispatch('createTag');
        $this->dispatch('refreshTags')->to(TagsData::class);
    }
    public function render()
    {
        return view('admin.tags.tags-create');
    }
}
