<?php

namespace App\Livewire\admin\users;

use App\Models\User;
use App\Models\Admin;
use Livewire\Component;
use App\Livewire\admin\users\UsersData;
use Illuminate\Support\Facades\Hash;

class UsersCreate extends Component
{
    public $name, $email, $password, $role = 'user';


    function rules()
    {
        return [
            'role' => 'required|string|min:1',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:' . $this->role . 's,email', // Ensure the email is unique
            'password' => 'required|string|min:8',
        ];
    }
    public function submit()
    {
        $data = $this->validate($this->rules());
        $data['password'] = Hash::make($this->password);
        $data = collect($data)->except('role')->toArray();

        // Select Model from role and assign it
        switch ($this->role) {
            case 'user':
                $user = User::create($data);
                $user->assignRole($this->role);
                break;
            case 'admin':
                $admin = Admin::create($data);
                $admin->assignRole($this->role);
                break;
        }

        // reset data
        $this->reset(['name', 'email', 'password', 'role']);
        // hide and show modal
        $this->dispatch('createUserModal');
        // refresh users data
        $this->dispatch('refreshUsers')->to(UsersData::class);
    }
    public function render()
    {
        return view('admin.users.users-create');
    }
}
