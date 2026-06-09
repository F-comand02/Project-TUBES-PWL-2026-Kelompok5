<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class LogisticExpiringSoonNotification extends Notification
{
    use Queueable;

    public function __construct(
        public $logistic
    ) {}

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [

            'title' => 'Logistic Expiring Soon',

            'message' =>
                $this->logistic->item_name .
                ' will expire on ' .
                $this->logistic->expired_date,

            'logistic_id' => $this->logistic->id,

        ];
    }
}