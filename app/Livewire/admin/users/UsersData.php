<?php

namespace App\Livewire\admin\users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersData extends Component
{
    use WithPagination;

    public $search;
    protected $listeners=['refreshUsers' => '$refresh','changeUserStatus'];
    function UpdatingSearch()
    {
        $this->resetPage();
    }
    public function changeUserStatus($id){
        $user = User::find($id);
        if($user->status == 'active'){
            $user->status = 'block';
        }
        else{
            $user->status = 'active';
        }
        $user->save();
        $this->dispatch('refreshUsers');
    }
    public function render()
    {
        return view('admin.users.users-data', ['users' => User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->paginate(10)]);
    }
}
