<?php

namespace App\Livewire\Admin\Vendors;

use Livewire\Component;

class VendorsRegistrationDate extends Component
{
    public $start_at, $end_at;
    public function roles()
    {
        return [
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
        ];
    }
    public function submit()
    {
        $this->validate($this->roles());
        
    }
    public function render()
    {
        return view('admin.vendors.vendors-registration-date');
    }
}
