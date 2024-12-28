<?php

namespace App\Livewire\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;

class TagsData extends Component
{
    public $search, $showArchived = false;
    protected $listeners = ['refreshTags' => '$refresh','restoreTag'];
    public function UpdateingSearch()
    {
        $this->resetPage();
    }
    public function deleteTag($id)
    {
        dd($id);
    }
    public function showArchivedTags()
    {
        if ($this->showArchived) {
            $this->showArchived = false;
        } else {
            $this->showArchived = true;
        }
    }
    public function restoreTag($id)
    {
        Tag::where('id', $id)->restore();
    }
    public function render()
    {
        $query = $this->showArchived
            ? Tag::onlyTrashed()
            : Tag::query();

        $tags = $query
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);
        return view('admin.tags.tags-data', compact('tags'));
    }
}
