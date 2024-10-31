<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class CategoriesCreate extends Component
{
    public $name,$parent_id,$department_id;
    protected $listeners=['createCategory'];

    public function rules(){
        return [
            'name' => 'required|string|unique:categories,name',
            'parent_id' => 'nullable|exists:categories,id',
            'department_id' => 'required|exists:departments,id'
        ];
    }
    public function submit(){
        $this->validate($this->rules());
        Category::create([
            'name' => $this->name,
            'parent_id' => $this->parent_id,
            'department_id' => $this->department_id,
        ]);
        $this->reset(['name','parent_id','department_id']);
        $this->dispatch('createCategory');
        $this->dispatch('refreshCategories')->to(CategoriesData::class);
    }
    public function render()
    {
        return view('admin.categories.categories-create',['categories' => Category::all()]);
    }
}
