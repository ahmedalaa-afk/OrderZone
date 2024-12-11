<?php

namespace App\Livewire\Admin\Departments;

use App\Models\Department;
use Livewire\Component;
use Livewire\WithPagination;

class DepartmentsData extends Component
{
    use WithPagination;
    public $listeners = ['refreshDepartments' => '$refresh','restoreDepartment'];
    public $search = '';
    public $showArchived = false;
    public function UpdatingSearch()
    {
        $this->resetPage();
    }
    public function showArchivedDepartments()
    {
        if ($this->showArchived) {
            $this->showArchived = false;
        } else {
            $this->showArchived = true;
        }
    }
    public function restoreDepartment($id)
    {
        Department::where('id', $id)->restore();
    }
    public function render()
    {
        $query = $this->showArchived
            ? Department::onlyTrashed()
            : Department::query();

        $departments = $query
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('admin.departments.departments-data', compact('departments'));
    }
}
