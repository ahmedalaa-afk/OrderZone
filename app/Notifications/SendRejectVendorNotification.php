<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendRejectVendorNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
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
            ->subject('Application to OrderZone')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('Thank you for your interest in joining the OrderZone e-commerce platform.')
            ->line('After careful review of your application, we regret to inform you that your request to become a vendor has not been approved at this time.')
            ->line('We encourage you to reapply in the future and appreciate your understanding.')
            ->line('If you have any questions, feel free to contact our support team.')
            ->line('Thank you for considering OrderZone.');
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
