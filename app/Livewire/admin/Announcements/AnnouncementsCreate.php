<?php

namespace App\Livewire\Admin\Announcements;

use App\Events\NewAnnouncementToVendorEvent;
use App\Models\Announcement;
use App\Models\Vendor;
use App\Notifications\NewAnnouncementToVendorNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class AnnouncementsCreate extends Component
{
    public $title, $content;
    public function rules(){
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];
    }
    public function submit(){
        $this->validate();
        $announcement = Announcement::create([
            'title' => $this->title,
            'content' => $this->content,
            'admin_id' => Auth::guard('admin')->user()->id,
        ]);
        $this->reset(['title', 'content']);
        // send announcement notification to all vendors
        $vendors = Vendor::all();
        Notification::send($vendors,new NewAnnouncementToVendorNotification($announcement));
        // dispatch event notification
        NewAnnouncementToVendorEvent::dispatch();
        $this->dispatch('createAnnouncementModal');
        $this->dispatch('refreshAnnouncements');
    }
    public function render()
    {
        return view('admin.announcements.announcements-create');
    }
}
