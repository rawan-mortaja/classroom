<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasActiveSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $exists = $user->subscriptions()
            ->where('expires_at', '>=', now())
            ->exists();

        if (!$exists) {
            abort(403, 'You Don\'t have active subscription.');
        }

        return $next($request);
    }
}
