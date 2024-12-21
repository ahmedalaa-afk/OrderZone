<?php

namespace App\Livewire\Vendor\Profile\Partials;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileInformation extends Component
{
    protected $listeners=['refreshProfile' => '$refresh'];
    public $name,$email;
    public function mount(){
        $this->name = auth('vendor')->user()->name;
        $this->email = auth('vendor')->user()->email;
    }
    public function submit(){
        $vendor = auth('vendor')->user();
        $vendor->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        $this->dispatch('refreshProfile');
    }
    public function render()
    {
        return view('vendor.profile.partials.profile-information');
    }
}
