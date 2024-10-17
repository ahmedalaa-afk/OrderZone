<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendVendorMeetingUrlNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $meetingDate;
    protected $meetingUrl;

    public function __construct($meetingDate, $meetingUrl)
    {
        $this->meetingDate = $meetingDate;
        $this->meetingUrl = $meetingUrl;
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
            ->subject('Meeting Scheduled')
            ->greeting('Hello Vendor,')
            ->line('A meeting has been scheduled with you.')
            ->line('Meeting Date: ' . $this->meetingDate)
            ->action('Join Meeting', $this->meetingUrl)
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
