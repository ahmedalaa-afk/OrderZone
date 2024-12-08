<?php

namespace App\Livewire\Admin\Departments;

use App\Models\Category;
use App\Models\Department;
use App\Models\Product;
use Livewire\Component;

class DepartmentsDelete extends Component
{
    protected $listeners = ['deleteDepartment'];
    public $department;
    public function deleteDepartment($id)
    {
        $this->department = Department::where('id', $id)->first();
        $this->dispatch('deleteDepartmentModal');
    }
    public function submit()
    {
        if ($this->department) {
            $categories = Category::whereHas('department',function($query){
                $query->where('department_id',$this->department->id);
            })->get();
            foreach ($categories as $category) {
                $category->department_id = null;
                $category->save();
            }

            $this->department->delete();
            $this->reset(['department']);
            $this->dispatch('deleteDepartmentModal');
            $this->dispatch('refreshDepartments')->to(DepartmentsData::class);
        }
    }
    public function render()
    {
        return view('admin.departments.departments-delete');
    }
}
