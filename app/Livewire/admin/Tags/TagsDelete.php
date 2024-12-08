<?php

namespace App\Livewire\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;

class TagsDelete extends Component
{
    protected $listeners=['deleteTag'];
    public $tag;
    public function deleteTag($id){
        $this->tag = Tag::find($id);
        $this->dispatch('deleteTagModal');
    }
    public function submit(){
        $this->tag->delete();
        $this->reset('tag');
        $this->dispatch('deleteTagModal');
        $this->dispatch('refreshTags')->to(TagsData::class);
    }
    public function render()
    {
        return view('admin.tags.tags-delete');
    }
}
