<?php

namespace App\Livewire\Vendor\Notifications;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationsData extends Component
{
    protected $listeners=['refreshNotifications' => '$refresh','deleteMessage'];
    public function mount(){
        Auth::guard('vendor')->user()->notifications->markAsRead();
    }
    public function deleteMessage($id){
        Auth::guard('vendor')->user()->notifications()->where('id',$id)->delete();
        $this->dispatch('refreshNotifications');
    }
    public function render()
    {
        $notifications = Auth::guard('vendor')->user()->notifications()->paginate(10);
        return view('vendor.notifications.notifications-data',['notifications' => $notifications]);
    }
}
