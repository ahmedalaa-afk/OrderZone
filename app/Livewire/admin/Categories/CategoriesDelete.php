<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class CategoriesDelete extends Component
{
    protected $listeners = ['deleteCategory'];
    public $category;
    public function deleteCategory($id)
    {
        $this->category = Category::where('id', $id)->first();
        $this->dispatch('deleteCategoryModal');
    }
    public function submit()
    {
        if ($this->category) {
            $this->category->delete();
            $this->reset(['category']);
            $this->dispatch('deleteCategoryModal');
            $this->dispatch('refreshCategories')->to(CategoriesData::class);
        }
    }
    public function render()
    {
        return view('admin.categories.categories-delete');
    }
}
