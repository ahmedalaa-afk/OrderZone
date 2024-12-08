<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class CategoriesUpdate extends Component
{
    public $name, $parent_id, $department_id, $category;
    protected $listeners = ['editCategory'];

    public function rules()
    {
        return [
            'name' => 'required|string|unique:categories,name',
            'parent_id' => 'nullable|exists:categories,id',
            'department_id' => 'required|exists:departments,id'
        ];
    }
    public function editCategory($id)
    {
        $this->category = Category::find($id);
        $this->name = $this->category->name;
        $this->parent_id = $this->category->parent_id;
        $this->department_id = $this->category->department_id;
        $this->dispatch('updateCategory');
    }
    public function submit()
    {
        $this->validate($this->rules());
        $this->category->update([
            'name' => $this->name,
            'parent_id' => $this->parent_id,
            'department_id' => $this->department_id,
        ]);
        $this->reset(['name', 'parent_id', 'department_id']);
        // $products = Product::whereHas('categories',function($query){
        //     $query->where('name',$this->name);
        // })->get();
        // dd($products);
        $this->dispatch('updateCategory');
        $this->dispatch('refreshCategories')->to(CategoriesData::class);
    }
    public function render()
    {
        return view('admin.categories.categories-update');
    }
}
