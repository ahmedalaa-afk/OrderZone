<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriesData extends Component
{
    use WithPagination;
    public $listeners=['refreshCategories' => '$refresh'];
    public $search;
    public function UpdatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $categories = Category::where('name' ,'like', '%' . $this->search .'%')->paginate(10);
        return view('admin.categories.categories-data',compact('categories'));
    }
}
