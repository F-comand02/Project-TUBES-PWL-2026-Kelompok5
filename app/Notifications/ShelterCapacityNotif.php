<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ShelterCapacityNotif extends Notification
{
    use Queueable;

    protected $shelter;

    public function __construct($shelter)
    {
        $this->shelter = $shelter;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [

            'title' => 'Shelter is Full',

            'message' =>
                $this->shelter->shelter_name .
                ' is full (' .
                $this->shelter->current_refugees .
                '/' .
                $this->shelter->capacity .
                ').',

            'shelter_id' => $this->shelter->id

        ];
    }
}