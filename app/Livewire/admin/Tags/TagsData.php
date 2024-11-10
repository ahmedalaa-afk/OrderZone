<?php

namespace App\Livewire\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;

class TagsData extends Component
{
    public $search;
    protected $listeners = ['refreshTags' => '$refresh'];
    public function UpdateingSearch(){
        $this->resetPage();
    }
    public function deleteTag($id){
        dd($id);
    }
    public function render()
    {
        $tags = Tag::where('tag', 'like', '%' . $this->search . '%')->paginate(10);
        return view('admin.tags.tags-data', compact('tags'));
    }
}
