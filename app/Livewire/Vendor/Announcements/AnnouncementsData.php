<?php

namespace App\Livewire\Vendor\Announcements;

use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AnnouncementsData extends Component
{
    protected $listeners = ['refreshVendorAnnouncements' => '$refresh'];
    public function render()
    {
        $notifications = Auth::guard('vendor')->user()->notifications()->paginate(10);
        return view('vendor.announcements.announcements-data',['notifications' => $notifications]);
    }
}
