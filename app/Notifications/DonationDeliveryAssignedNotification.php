<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class DonationDeliveryAssignedNotification extends Notification
{
    use Queueable;

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
            'title' => 'Donation On Delivery',

            'message' =>
                'Volunteer ' .
                $this->volunteerName .
                ' has accepted and is delivering your donation.',

            'donation_id' => $this->donation->id,
        ];
    }
}