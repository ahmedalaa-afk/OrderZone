<?php

namespace App\Livewire\Admin\Departments;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentsData extends Component
{
    use WithPagination;
    public $listeners = ['refreshDepartments' => '$refresh'];
    public $search;
    public function UpdatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $departments = Department::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('admin.departments.departments-data', compact('departments'));
    }
}
