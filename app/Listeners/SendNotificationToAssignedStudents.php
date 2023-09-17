<?php

namespace App\Listeners;

use App\Events\ClassworkCreated;
use App\Jobs\SendClassroomNotification;
use App\Models\User;
use App\Notifications\NewClassworkNotification;
use Events\APP\Events\ClassworkUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNotificationToAssignedStudents
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ClassworkCreated $event): void
    {
        //
        // $user = User::find(1);
        // $user->notify(new NewClassworkNotification($event->classwork));

        // foreach($event->classwork->users as $user){
        //     $user->notify(new NewClassworkNotification($event->classwork));
        // }

        $classwork = $event->classwork;

        dispatch(
            new SendClassroomNotification(
                $classwork->users,
                new NewClassworkNotification(
                    $classwork
                )
            )
        )/*->onQueue('notifications')->onConnection('sqs')*/;

        // SendClassroomNotification::dispatch($classwork->users, new NewClassworkNotification($classwork));

    }
}
