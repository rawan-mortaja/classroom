<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DevicesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'token' => ['required', 'string'],
        ]);

        $user = $request->user();
        $exists = $user->devices()
            ->where('token', '=', $request->post('token'))
            ->exists();

        if (!$exists) {
            $token =  $user->devices()->create([
                'token' => $request->post('token'),
            ]);
        }
        return $token;
    }

    public function destroy(Request $request, $token)
    {
        $user = $request->user();
        $user->devices()
            ->where('token', '=', $request->post('token'))
            ->delete();

        return [];
    }
}
