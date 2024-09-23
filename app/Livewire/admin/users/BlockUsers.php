<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;

class BlockUsers extends Component
{
    public $user;
    protected $listeners = ['blockUser'];
    public function blockUser($id)
    {
        $this->user = User::where('id', $id)->first();
        // hide and show modal
        $this->dispatch('blockUserModal');
    }

    public function submit()
    {
        // block user
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
        return view('admin.users.block-users');
    }
}
