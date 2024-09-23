<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;

class UsersDelete extends Component
{
    public $user;
    protected $listeners=['deleteUser'];
    public function deleteUser($id){
        $this->user = User::where('id',$id)->first();
        // hide and show modal
        $this->dispatch('deleteUserModal');
    }

    public function submit(){
        // delete user
        $this->user->delete();
        // reset user variable
        $this->reset('user');
        // hide and show modal
        $this->dispatch('deleteUserModal');
        // refresh users data
        $this->dispatch('refreshUsers')->to(UsersData::class);
        
    }
    
    public function render()
    {
        return view('admin.users.users-delete');
    }
}
