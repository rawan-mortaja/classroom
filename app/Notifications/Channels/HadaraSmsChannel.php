<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;

class HadaraSmsChannel
{

    public function send(Object $notifiable, Notification $notification): void
    {
       $service = new HadaraSms(config('services.hadara.key'));

       $service->send(
        $notifiable->routeNotificationForHadara($notification),
        $notification->toHadara($notifiable),
       );
    }
}
