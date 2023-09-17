<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class SendClassroomNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected $users, protected $notification)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(20);
        Notification::send($this->users, $this->notification);
    }
    
    public function onQueue($queue)
    {
        return 'notification';
    }
}
