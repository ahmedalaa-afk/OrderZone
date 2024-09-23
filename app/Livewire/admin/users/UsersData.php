<?php

namespace App\Livewire\admin\users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersData extends Component
{
    use WithPagination;

    public $search;
    function UpdatingSearch()
    {
        $this->resetPage();
    }
    protected $listeners=['refreshUsers' => '$refresh'];
    public function render()
    {
        return view('admin.users.users-data', ['users' => User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->paginate(10)]);
    }
}
