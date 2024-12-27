<?php

namespace App\Livewire\Admin\Profile\Partials;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class DeleteAccount extends Component
{
    public $current_password;
    public function rules(){
        return[
            'current_password' => 'required|min:8',
        ];
    }
    public function messages(){
        return [
            'current_password' => 'The Password field is required.',
        ];
    }
    public function submit(){
        $data = $this->validate();
        if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
            $admin = Auth::guard('admin')->user();
            $admin->delete();
            $this->reset(['current_password']);
            return to_route('/admin/login');
        } else {
            $this->addError('current_password','be sure of the password');
        }
    }
    public function render()
    {
        return view('admin.profile.partials.delete-account');
    }
}
