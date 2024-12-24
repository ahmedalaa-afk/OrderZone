<?php

namespace App\Livewire\Vendor\Profile\Partials;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use PhpParser\Node\Expr\FuncCall;

class DeleteAccount extends Component
{
    public $current_password;
    public function rules(){
        return[
            'current_password' => 'required|min:8',
        ];
    }
    public function submit(){
        $data = $this->validate();
        if (Hash::check($data['current_password'], Auth::guard('vendor')->user()->password)) {
            $vendor = Auth::guard('vendor')->user();
            foreach($vendor->products as $product) {
                $product->photos()->delete();
                $product->delete();
            }
            $vendor->delete();
            $this->reset(['current_password']);
            return to_route('/vendor/login');
        } else {
            $this->addError('current_password','be sure of the password');
        }
    }
    public function render()
    {
        return view('vendor.profile.partials.delete-account');
    }
}
