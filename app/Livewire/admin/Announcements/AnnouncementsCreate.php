<?php

namespace App\Livewire\Admin\Announcements;

use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
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
        Announcement::create([
            'title' => $this->title,
            'content' => $this->content,
            'admin_id' => Auth::guard('admin')->user()->id,
        ]);
        $this->reset(['title', 'content']);
        $this->dispatch('createAnnouncementModal');
        $this->dispatch('refreshAnnouncements');
    }
    public function render()
    {
        return view('admin.announcements.announcements-create');
    }
}
