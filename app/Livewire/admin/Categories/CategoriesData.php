<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesData extends Component
{
    use WithPagination;
    public $listeners = ['refreshCategories' => '$refresh', 'restoreCategory'];
    public $search = '';
    public $showArchived = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function showArchivedCategories()
    {
        if ($this->showArchived) {

            $this->showArchived = false;
        }
        else {
            $this->showArchived = true;
        }
    }

    public function restoreCategory($id)
    {
        Category::where('id', $id)->restore();
    }

    public function render()
    {
        $query = $this->showArchived
            ? Category::onlyTrashed()
            : Category::query();

        $categories = $query
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('admin.categories.categories-data', ['categories' => $categories]);
    }
}
