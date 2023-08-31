<?php

namespace App\Providers;

use App\Events\ClassworkCreated;
use App\Listeners\PostInClassroomStream;
use \APP\Events\ClassworkUpdated;
// use APP\Listeners\SendNotificationToAssignedStudents;
use \APP\Listeners\SendNotificationToAssignedStudents;
use App\Models\Classroom;
use App\Observers\ClassroomObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use PhpParser\Builder\Function_;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,

        ],
        ClassworkCreated::class => [
            PostInClassroomStream::class,
            'App\Listeners\SendNotificationToAssignedStudents',
        ],

    ];

    // protected $observers = [
    //     Classroom::class => ClassroomObserver::class,
    // ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        // Classroom::observe(ClassroomObserver::class);

        // Event::listen('classwork.create' , function($classroom , $classwork){
        //     dd('Event triggered!');
        // });

        // Event::listen('classwork.create' , [new PostInClassroomStream , 'handle']);

    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
