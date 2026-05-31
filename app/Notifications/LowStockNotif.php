<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class LowStockNotif extends Notification
{
    use Queueable;

    protected $logistic;

    public function __construct($logistic)
    {
        $this->logistic = $logistic;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [

            'title' => 'Low Stock Alert',

            'message' =>
                $this->logistic->item_name .
                ' stock is running low (' .
                $this->logistic->stock .
                ' remaining).',

            'logistic_id' => $this->logistic->id,

            'shelter_id' => $this->logistic->shelter_id

        ];
    }
}