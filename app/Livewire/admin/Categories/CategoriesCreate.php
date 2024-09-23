<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class CategoriesCreate extends Component
{
    public $name,$parent_id;
    protected $listeners=['createCategory'];

    public function rules(){
        return [
            'name' => 'required|string|unique:categories,name',
            'parent_id' => 'nullable|exists:categories,id'
        ];
    }
    public function submit(){
        $data = $this->validate($this->rules());
        Category::create($data);
        $this->reset(['name','parent_id']);
        $this->dispatch('createCategory');
        $this->dispatch('refreshCategories')->to(CategoriesData::class);
    }
    public function render()
    {
        return view('admin.categories.categories-create',['categories' => Category::all()]);
    }
}
