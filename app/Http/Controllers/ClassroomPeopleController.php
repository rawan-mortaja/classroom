<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomPeopleController extends Controller
{
    public function __invoke(Classroom $classroom) // magic method تسمح انه استدعي الاوبجكت ك فنكشن
    {
        return view('classrooms.people', compact(['classroom']));
    }
}
