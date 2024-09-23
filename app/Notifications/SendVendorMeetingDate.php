<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendVendorMeetingDate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $vendor, $meeting_url, $meeting_date;
    public function __construct($vendor, $meeting_url, $meeting_date)
    {
        $this->vendor = $vendor;
        $this->meeting_url = $meeting_url;
        $this->meeting_date = $meeting_date;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Hello Mr.' . $this->vendor->name)
            ->line('We are excited to make a meeting with you on ' . Carbon::parse($this->meeting_date)->format('l, F j, Y \a\t h:i A'))

            ->action('Meeting Url', url($this->meeting_url))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
