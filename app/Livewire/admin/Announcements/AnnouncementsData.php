<?php

namespace App\Livewire\Admin\Announcements;

use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AnnouncementsData extends Component
{
    public $search;

    protected $listeners = ['refreshAnnouncements' => '$refresh'];

    public function render()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.announcements.announcements-data', ['announcements' => $announcements]);
    }
}
