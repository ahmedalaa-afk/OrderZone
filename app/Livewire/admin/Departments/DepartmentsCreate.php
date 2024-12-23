<?php

namespace App\Livewire\Admin\Departments;

use App\Models\Department;
use Livewire\Component;

class DepartmentsCreate extends Component
{
    public $name, $description;
    protected $listeners = ['createDepartment'];

    public function rules()
    {
        return [
            'name' => 'required|string|unique:categories,name',
            'description' => 'nullable|string'
        ];
    }
    public function submit()
    {
        $data = $this->validate($this->rules());
        Department::create($data);
        $this->reset(['name', 'description']);
        $this->dispatch('createDepartment');
        $this->dispatch('refreshDepartments')->to(DepartmentsData::class);
    }
    public function render()
    {
        return view('admin.departments.departments-create', ['departments' => Department::all()]);
    }
}
