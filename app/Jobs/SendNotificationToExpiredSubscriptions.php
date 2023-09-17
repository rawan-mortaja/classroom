<?php

namespace App\Jobs;

use App\Models\Subscription;
use App\Notifications\ExpiredSubscriptionNoticifation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNotificationToExpiredSubscriptions implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // َQuery to get expired subscriptions
        $subscriptions = Subscription::with('user')
            ->WhereDate(
                'expired_at',
                '=',
                now()->subDays(3)
            )->cursor();

        foreach ($subscriptions as $subscription) {
            $subscription->user->notify(new ExpiredSubscriptionNoticifation($subscription));
        }
    }
}
