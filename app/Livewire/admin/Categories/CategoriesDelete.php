<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use App\Models\Product;
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
            $products = Product::whereHas('categories', function ($query) {
                $query->where('name', $this->category->name);
            })->get();

            foreach ($products as $product) {
                $product->categories()->detach();
            }

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
