<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ParcelStatusUpdated extends Notification
{
    use Queueable;

    public function __construct(public $parcel)
    {
    }

    public function broadcastOn()
    {
        return ['parcel-status-channel'];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'parcel_id' => $this->parcel->id,
            'status' => $this->parcel->status,
            'current_location' => $this->parcel->current_location,
        ]);
    }
} 