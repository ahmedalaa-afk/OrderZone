<?php

namespace App\Livewire\Admin\Announcements;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AnnouncementsData extends Component
{
    public $search;

    protected $listeners=['refreshNotifications' => '$refresh'];

    public function render()
    {
        $notifications = Auth::guard('admin')->user()->notifications()->paginate(10);
        return view('admin.announcements.announcements-data', ['notifications' => $notifications]);
    }
}
