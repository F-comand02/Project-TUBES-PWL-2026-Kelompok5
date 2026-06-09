<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ComplaintCompletedNotification extends Notification
{
    use Queueable;

    public function __construct(
        public string $volunteerName,
        public $complaint
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => 'Complaint Resolved',

            'message' =>
                'Your complaint has been successfully resolved by volunteer '
                . $this->volunteerName
                . '.',

            'complaint_id' => $this->complaint->id,
        ];
    }
}