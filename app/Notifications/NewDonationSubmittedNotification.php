<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewDonationSubmittedNotification extends Notification
{
    use Queueable;

    public function __construct(public $donation)
    {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => 'New Donation Submitted',

            'message' =>
                $this->donation->donor_name .
                ' submitted a donation: ' .
                $this->donation->item_name,

            'donation_id' => $this->donation->id,
        ];
    }
}