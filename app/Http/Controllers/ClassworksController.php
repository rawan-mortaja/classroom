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
    public function create(Request $request, Classroom $classroom)
    {

        $type = $this->getType($request);
        $topics  = Topic::all();
        return view('classworks.create', compact('classroom', 'type', 'topics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Classroom $classroom)
    {

        // dd($request->all());
        $type = $this->getType($request);
        $request->validate([
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
        return redirect()->route('classrooms.classworks.index', $classroom->id)
            ->with('msg', 'classwork craeted successfully')
            ->with('type', 'success');
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
    public function edit(string $id, Classroom $classroom, classwork $classwork)
    {
        $topic = classwork::findOrFail($id);
        return view('classworks.edit', [
            'classwork' => $classwork,
            'classroom' => $classroom,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom, classwork $classwork)
    {
        $validated =  $request->validated();

        // Mass assignment
        $classwork->update($validated);

        return Redirect::route('classrooms.classworks.index')
            ->with('success', 'Classwork updated');
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
