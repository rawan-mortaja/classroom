<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class ClassroomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classroom = Classroom::with('users:id,name', 'topics')
            ->withCount('students as student')
            ->paginate(2);

        return Response::json($classroom, 200, [
            'x-test' => 'test'
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // try{
        $request->validate([
            'name' => ['required'],
        ]);
        // }catch(Exception $e){
        //     return Response::json([
        //         'message' => 'The name field is required!!!',
        //     ]);
        // }
        $classroom = Classroom::create($request->all());

        $classroom->updated($request->all());
        return Response::json([
            'code' => 100,
            'message' => __('Classroom Created!'),
            'classroom' => $classroom,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        return $classroom->load('users')->loadCount('students');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'name' => ['sometimes', 'required', Rule::uniqid('classrooms', 'name')->ignore($classroom->id)],
            'section' => ['sometimes', 'required'],
        ]);

        $classroom->updated($request->all());
        return [
            'code' => 100,
            'message' => __('Classroom Updated!'),
            'classroom' => $classroom,
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Classroom::destroy($id);
        return Response::json([], 204);
        // return [
        //     'code' => 100,
        //     'message' => __('Classroom Deleted!'),
        // ];
    }
}
