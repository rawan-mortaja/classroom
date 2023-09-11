<?php

namespace App\Services\Payments;

use App\Models\Payments;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Stripe\StripeClient;
use Symfony\Component\HttpFoundation\Response;

class StripePayment
{
    public function createCheckoutSession(Subscription $subscription): Response
    {

        $stripe = app(StripeClient::class);

        $date1 = Carbon::parse($subscription->expires_at);
        $date2 = Carbon::parse($subscription->created_at);

        $checkout_session = $stripe->checkout->sessions->create(
            [
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $subscription->plan->name,
                            ],
                            'unit_amount' => $subscription->plan->price * 100,
                        ],
                        'quantity' => $date1->diffInMonths($date2),
                    ]
                ],
                'client_reference_id' => $subscription->id,
                'metadata' => [
                    'subscription_id' => $subscription->id,
                ],
                'mode' => 'payment',
                'success_url' => route('paymnets.seccess', $subscription->id),
                'cancel_url' => route('paymnets.cancel', $subscription->id),
            ]
        );

        Payments::forceCreate([
            'user_id' => Auth::id(),
            'subscription_id' => $subscription->id,
            'amount' => $subscription->price * 100,
            'currency_code' => 'usd',
            'payment_geteway' => 'srtipe',
            'geteway_refernce_id' => $checkout_session->payment_intent,
            'data' => $checkout_session,
        ]);
        return redirect()->away($checkout_session->url);
    }
}
