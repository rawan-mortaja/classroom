<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\classwork;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ClassworksController extends Controller
{

    public function getType(Request $request)
    {
        $type = $request->query('type');
        $allowed_types = [
            classwork::TYPE_ASSIGNMENT,
            classwork::TYPE_MATERIAL,
            classwork::TYPE_QUESTION,
        ];

        if (!in_array($type, $allowed_types)) {
            $type = classwork::TYPE_ASSIGNMENT;
        };

        return $type;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Classroom $classroom)
    {

        // $classworks = classwork::where('classroom_id', '=' . $classroom->id)
        //     ->where('tyoe', '=', classwork::TYPE_ASSIGNMENT)
        //     ->get();


        $classworks = $classroom->classworks()
            ->with('topic') //Eager load
            ->orderBy('published_at')
            ->get(); // lazy()


        return view('classworks.index', [
            'classroom' => $classroom,
            'classworks' => $classworks->groupBy('topic_id'),
        ]);

        // $assignments = $classroom->classworks()
        //     ->where('tyoe', '=', classwork::TYPE_ASSIGNMENT)
        //     ->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Classroom $classroom , classwork $classwork)
    {

        $type = $this->getType($request);
        $classworks  = classwork::all();
        return view('classworks.create', compact('classroom', 'type', 'classworks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Classroom $classroom , classwork $cl)
    {

        // dd($request->all());
        $type = $this->getType($request);

        $validate=  $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'topic_id' => ['nullable', 'int', 'exists:topics,id'],


        ]);

        $request->merge([
            'user_id' => Auth::id(),
            'type' => $type,
        ]);

        // dd($request->all());

        $classwork = $classroom->classworks()
            ->create($request->all());

        $classwork->users()->attach($request->input('students'));

        return redirect()
            ->route('classrooms.classworks.index', $classroom->id)
            ->with('msg', 'classwork craeted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom, classwork $classwork)
    {
        return View::make('classworks.show')
            ->with([
                'classroom' => $classroom,
                'classwork' => $classwork,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Classroom $classroom, classwork $classwork)
    {
        $type = $this->getType($request);

        $assigned = $classwork->users()
            ->pluck('id')
            ->toArray(); // تحول العنصر لاوبجكت

        return view('classworks.edit', compact('classroom', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom, classwork $classwork)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'topic_id' => ['nullable', 'int', 'exists:topics,id'],


        ]);

        // Mass assignment
        $classwork->update($validated);
        $classwork->users()->sync($request->input('students')); //بتخلي الاري و الجدول متطابقين

        return back()
            ->with('success', 'Classwork updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom, classwork $classwork)
    {
        $classwork->delete();

        return redirect(route('classrooms.classworks.index'))
            ->with('success', 'Classwork deleted');
    }
}
