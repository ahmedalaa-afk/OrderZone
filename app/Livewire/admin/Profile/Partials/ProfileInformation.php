<?php

namespace App\Livewire\Admin\Profile\Partials;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileInformation extends Component
{
    protected $listeners=['refreshProfile' => '$refresh'];
    public $name,$email;
    public function mount(){
        $this->name = Auth::guard('admin')->user()->name;
        $this->email = Auth::guard('admin')->user()->email;
    }
    public function submit(){
        $admin = Auth::guard('admin')->user();
        $admin->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        $this->dispatch('refreshProfile');
    }
    public function render()
    {
        return view('admin.profile.partials.profile-information');
    }
}
