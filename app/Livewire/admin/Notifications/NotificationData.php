<?php

namespace App\Livewire\Admin\Notifications;

use App\Models\Admin;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NotificationData extends Component
{
    public $search;

    protected $listeners=['refreshNotifications' => '$refresh'];

    public function render()
    {
        $notifications = Auth::guard('admin')->user()->notifications()->paginate(10);
        return view('admin.notifications.notification-data', ['notifications' => $notifications]);
    }
}
