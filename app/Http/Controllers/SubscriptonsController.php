<?php

namespace App\Http\Controllers;

use App\Actions\CreateSubscription;
use App\Http\Requests\CreateSubscriptionRequest;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Throwable;

class SubscriptonsController extends Controller
{
    public function store(CreateSubscriptionRequest $request, CreateSubscription $create)
    {
        $plan = Plan::findOrFail($request->post('plan_id'));
        $months = $request->post('period');
        try{
        $subscription =  $create([
            'plan_id' => $plan->id,
            'user_id' => $request->user()->id,
            'price' => $plan->price * $months,
            'expires_at' => now()->addMonths($months),
            'status' => 'pending',
        ]);

        return redirect()->route('checkout' , $subscription->id);

    } catch(Throwable $e){
        return back()->with('error' , $e->getMessage());
    }
    }
}
