<?php

namespace App\Livewire\Vendor\Announcements;

use Livewire\Component;

class AnnouncementsData extends Component
{
    protected $listeners = ['refreshVendorAnnouncements' => '$refresh'];
    public function render()
    {
        return view('vendor.announcements.announcements-data');
    }
}
