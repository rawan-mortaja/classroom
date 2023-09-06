<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptonsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'plan_id' => ['required', 'int', 'exists:plans,id'],
            'period' => ['required', 'int', 'min:1'],
        ]);

        $plan = Plan::findOrFail($request->post('plan_id'));
        $months = $request->post('period');

        Subscription::forceCreate([
            'plan_id' => $plan->id,
            'user_id' => $request->user()->id,
            'price' => $plan->price * $months,
            'expires_at' => now()->addMonths($months),
        ]);
    }
}
