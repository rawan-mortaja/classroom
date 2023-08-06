<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomPeopleController extends Controller
{
    public function index(Classroom $classroom) // (__invoke)>> magic method تسمح انه استدعي الاوبجكت ك فنكشن
    {
        return view('classrooms.people', compact(['classroom']));
    }

    public function destroy(Request $request, Classroom $classroom)
    {
        $request->validate([
            'user_id' => ['required', /* 'exists:classroom_user,user_id' */]
        ]);

        $user_id = $request->input('user_id');

        if ($user_id == $classroom->user_id) {
            return redirect()
                ->route('classrooms.people', $classroom->id)
                ->with('error', 'Connot remove user!');
        }
        $classroom->users()->detach($user_id);
        
        return redirect()
            ->route('classrooms.people', $classroom->id)
            ->with('success', 'User removed!');
    }
}
