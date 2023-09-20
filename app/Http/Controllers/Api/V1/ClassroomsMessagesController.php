<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Message;
use Illuminate\Http\Request;

class ClassroomsMessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Classroom $classroom)
    {
        return $classroom->messages()
            ->Select([
                'message.id',
                'message.sender_id',
                'message.recipient_id',
                'message.recipient_type',
                'message.bady',
                'messages.created_at as sent_at'
            ])
            ->with('sender:id, name')
            ->latest()
            ->paginate(30);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Classroom $classroom)
    {
        $request->validate([
            'body' => ['required', 'string'],
        ]);
        $message =    $classroom->messages()->create([
            'sender_id' => $request->user()->id,
            'body' => $request->post('body'),
        ]);

        // event(new MessageSent($message));
        MessageSent::broadcast($message)->toOthers();

        return $message;
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom, Message $message)
    {
        return $message;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom,  Message $message)
    {
        $request->validate([
            'body' => ['required', 'string'],
        ]);

        $message->update([
            'body' => $request->post('body'),
        ]);

        return $message;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom, Message $message)
    {
        $message->delete();

        return [];
    }
}
