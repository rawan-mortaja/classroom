<?php

namespace App\Actions;

use App\Models\Subscription;

class CreateSubscription
{

    /**
     * @param $data array
     * @return \App\Models\Subscription
     */

    public function __invoke(array $data): Subscription
    {
        return Subscription::create($data);
    }
}
