<?php

namespace App\Livewire\Admin\Vendors;

use App\Models\VendorRegistrationApplicationDate;
use Livewire\Component;

class VendorsRegistrationDate extends Component
{
    public $start_at, $end_at, $registration_date;
    public function mount()
    {
        $this->registration_date = VendorRegistrationApplicationDate::find(1);
        if ($this->registration_date) {
            $this->start_at = $this->registration_date->start_at;
            $this->end_at = $this->registration_date->end_at;
        }
    }
    public function rules()
    {
        return [
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
        ];
    }
    public function submit()
    {
        $this->validate($this->rules());
        if (!$this->registration_date) {
            $this->registration_date = VendorRegistrationApplicationDate::create([
                'start_at' => $this->start_at,
                'end_at' => $this->end_at,
            ]);
        } else {
            $this->registration_date->update([
                'start_at' => $this->start_at,
                'end_at' => $this->end_at,
            ]);
        }

        session()->flash('success', 'Vendor registration dates have been saved successfully.');
    }

    public function render()
    {
        return view('admin.vendors.vendors-registration-date');
    }
}
