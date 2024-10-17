<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendAcceptVendorNotification extends Notification
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
            ->subject('Your OrderZone Application Has Been Approved!')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('Congratulations! We are pleased to inform you that your application to join the OrderZone e-commerce platform has been approved.')
            ->line('However, please note that you will not be able to log in to your account just yet.')
            ->line('We will be sending you the date and URL for a meeting to discuss your vendor data and complete the onboarding process.')
            ->line('Thank you for choosing OrderZone. We look forward to helping you get started!');
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
