<?php

namespace App\Livewire\Vendor\Profile\Partials;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdatePassword extends Component
{
    public $current_password, $password, $password_confirmation;

    public function rules()
    {
        return [
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        if (Hash::check($data['current_password'], Auth::guard('vendor')->user()->password)) {
            Auth::guard('vendor')->user()->update(['password' => Hash::make($data['password'])]);
            session()->flash('message', 'Password updated successfully');
            $this->reset(['current_password', 'password', 'password_confirmation']);
        } else {
            $this->addError('current_password','be sure of the password');
        }
    }
    public function render()
    {
        return view('vendor.profile.partials.update-password');
    }
}
