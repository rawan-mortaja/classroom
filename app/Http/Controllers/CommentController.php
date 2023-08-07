<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\classwork;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'content' => ['required', 'string'],
            'id' => ['required', 'int'],
            'type' => ['required', 'in:classwork,post'],
        ]);

        // dd(Auth::user());

        Auth::user()->comments()->create([
            'commentable_id' => $request->input('id'),
            'commentable_type' => $request->input('type'), // App\Models\Classwork
            'content' => $request->input('content'),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return back()->with('success', 'Comment added');
    }

  
}
