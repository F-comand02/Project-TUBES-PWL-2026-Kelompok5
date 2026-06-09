<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewShelterCreated extends Notification
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

            'title' => 'New Shelter Created',

            'message' =>
                'Shelter "' .
                $this->shelter->shelter_name .
                '" is now available.',

            'shelter_id' => $this->shelter->id

        ];
    }
}