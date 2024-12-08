<?php

namespace App\Livewire\Admin\Departments;

use App\Models\Department;
use Livewire\Component;

class DepartmentsUpdate extends Component
{
    public $name, $description,$department;
    protected $listeners = ['editDepartment'];

    public function rules()
    {
        return [
            'name' => 'required|string|unique:categories,name',
            'description' => 'nullable|string'
        ];
    }
    public function editDepartment($id){
        $this->department = Department::where('id',$id)->first();
        $this->name = $this->department->name;
        $this->description = $this->department->description;
        $this->dispatch('updateDepartment');
    }
    public function submit()
    {
        $data = $this->validate($this->rules());
        $this->department->update($data);
        $this->reset(['name', 'description']);
        $this->dispatch('updateDepartment');
        $this->dispatch('refreshDepartments')->to(DepartmentsData::class);
    }
    public function render()
    {
        return view('admin.departments.departments-update');
    }
}
