<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesData extends Component
{
    use WithPagination;
    public $listeners = ['refreshCategories' => '$refresh'];
    public $search = '';
    public $showArchived = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function showArchivedCategories()
    {
        $this->showArchived = true;
        $this->resetPage();
    }

    public function showActiveCategories()
    {
        $this->showArchived = false;
        $this->resetPage();
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
