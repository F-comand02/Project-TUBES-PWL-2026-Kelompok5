<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DonationDeliveredNotification extends Notification
{
    public function __construct(
        public string $volunteerName,
        public $donation
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => 'Donation Delivered',

            'message' =>
                'Your donation has been successfully delivered to the shelter by volunteer '
                . $this->volunteerName
                . '.',
        ];
    }
}
