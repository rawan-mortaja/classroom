<?php

namespace App\Http\Controllers\Webhooks;

use App\Http\Controllers\Controller;
use App\Models\Payments;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Stripe\StripeClient;

class Stripecontroller extends Controller
{
    public function __invoke(Request $request, StripeClient $srtipe)
    {

        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = 'whsec_f70ae682b5e78cbac30671290af3ad73299efcbff7b13ad0a679ac979b0bb8b9';

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                Payments::where('geteway_refernce_id', $session->id)
                    ->update([
                        'geteway_refernce_id' => $session->payment_intent,
                    ]);
                break;
            case 'payment_intent.amount_capturable_updated':
                $paymentIntent = $event->data->object;
                break;
            case 'payment_intent.canceled':
                $paymentIntent = $event->data->object;
                break;
            case 'payment_intent.created':
                $paymentIntent = $event->data->object;
                // Delete Subscription
                break;
            case 'payment_intent.partially_funded':
                $paymentIntent = $event->data->object;
                break;
            case 'payment_intent.payment_failed':
                $paymentIntent = $event->data->object;
                break;
            case 'payment_intent.processing':
                $paymentIntent = $event->data->object;
                break;
            case 'payment_intent.requires_action':
                $paymentIntent = $event->data->object;
                break;
            case 'payment_intent.succeeded':
                $paymentIntent = $event->data->object;
                $payment =    Payments::where('geteway_refernce_id', $paymentIntent->id)
                    ->first();
                $payment->forceFill([
                    'status' => 'completed',
                ])->save();
                $subscription = Subscription::where('id', $payment->subscription_id)->first();
                $subscription->update([
                    'status' => 'active',
                    'expires_at' => now()->addMonths(3),
                ]);
                break;
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('' , 200);
    }
}
