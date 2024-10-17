<?php

namespace App\Livewire\Admin\Notifications;

use App\Events\NewVendorRegisteredEvent;
use App\Http\Traits\ZoomMeetingTrait;
use App\Models\Vendor;
use App\Models\ZoomMeeting;
use App\Notifications\SendAcceptVendorNotification;
use App\Notifications\SendRejectVendorNotification;
use App\Notifications\SendVendorMeetingDate;
use Carbon\Carbon;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use MacsiDigital\Zoom\Facades\Zoom;

class NotificationsShow extends Component
{

    protected $listeners = ['notificationShow', 'acceptVendor', 'rejectVendor'];
    public $notification;
    public function notificationShow($id)
    {
        $this->notification = DatabaseNotification::where('id', $id)
            ->first();
        $this->notification->markAsRead();
        $this->dispatch('showNotificationModal');
    }
    public function acceptVendor()
    {
        $vendor = Vendor::where('email', $this->notification->data['email'])->first();

        if ($vendor) {

            $vendor->accepted_at = now();
            $vendor->save();

            $this->reset('notification');

            $vendor->status = "approved";
            $vendor->save();

            // send email notification to vendor
            Notification::sendNow($vendor, new SendAcceptVendorNotification());
            $this->dispatch('showNotificationModal');
            $this->dispatch('refreshNotifications')->to(NotificationData::class);
            // run event to update notification number
            NewVendorRegisteredEvent::dispatch();
        }
    }
    public function rejectVendor()
    {
        $vendor = Vendor::where('email', $this->notification->data['email'])->first();

        if ($vendor) {
            $this->reset('notification');

            // send email notification to vendor
            Notification::sendNow($vendor, new SendRejectVendorNotification());
            $this->dispatch('showNotificationModal');
            $this->dispatch('refreshNotifications')->to(NotificationData::class);
            // run event to update notification number
            NewVendorRegisteredEvent::dispatch();
        }
    }

    public function render()
    {
        return view('admin.notifications.notifications-show', [
            'notification' => $this->notification,
        ]);
    }
}
