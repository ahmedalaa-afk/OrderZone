<?php

namespace App\Livewire\Vendor\Notifications;

use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationsData extends Component
{
    public $search;

    protected $listeners = ['refreshNotifications' => '$refresh'];

    public function render()
    {
        $notifications = Auth::guard('vendor')
            ->user()
            ->notifications()
            ->where('data->key','notification')
            ->paginate(10);

        return view('vendor.notifications.notifications-data', ['notifications' => $notifications]);
    }
}
