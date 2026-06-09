<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ComplaintTakenNotification extends Notification
{
    use Queueable;

    protected $volunteerName;
    protected $complaint;

    public function __construct($volunteerName, $complaint)
    {
        $this->volunteerName = $volunteerName;
        $this->complaint = $complaint;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'title' => 'Complaint Assigned',
            'message' =>
                'Volunteer '
                . $this->volunteerName
                . ' has accepted complaint '
                . $this->complaint->title 
                . ' and is now handling your complaint.',
            'complaint_id' => $this->complaint->id,
        ];
    }
}