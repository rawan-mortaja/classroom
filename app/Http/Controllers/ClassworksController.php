<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\classwork;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use App\Models\User\Submission;

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
    public function index(Request $request, Classroom $classroom)
    {

        // $classworks = classwork::where('classroom_id', '=' . $classroom->id)
        //     ->where('tyoe', '=', classwork::TYPE_ASSIGNMENT)
        //     ->get();


        $classworks = $classroom->classworks()
            ->with('topic') //Eager load
            ->filter($request->query())
            // ->orderBy('published_at' , 'DESC')
            ->latest('published_at')
            ->paginate(5); //Query Builder

        return view('classworks.index', [
            'classroom' => $classroom,
            'classworks' => $classworks // lazy(),
        ]);

        // $assignments = $classroom->classworks()
        //     ->where('tyoe', '=', classwork::TYPE_ASSIGNMENT)
        //     ->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Classroom $classroom, classwork $classwork)
    {

        $type = $this->getType($request);
        $classwork = new classwork();
        $classworks  = classwork::all();
        return view('classworks.create', compact('classroom', 'classwork',  'type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Classroom $classroom)
    {


        $type = $this->getType($request);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'topic_id' => ['nullable', 'int', 'exists:topics,id'],
            'options.grade' => [Rule::requiredIf(fn () => $type == 'assignment' || $type == 'question'), 'numeric', 'min:0'],
            'options.due' => ['nullable', 'date', 'after:published_at'],
        ]);
        // dd($request->all());
        $request->merge([
            'user_id' => Auth::id(),
            'type' => $type,
        ]);

        try {

            DB::transaction(function () use ($classroom, $request) {
                // $data = [
                //     'user_id' => Auth::id(),
                //     'type' => $type,
                //     'title' => $request->input('title'),
                //     'description' => $request->input('description'),
                //     'topic_id' => $request->input('topic_id'),
                //     'published_at' => $request->input('published_at', now()),
                //     'options' => [
                //         'grade' => $request->input('grade'),
                //         'due' => $request->input('due'),
                //     ],
                // ];

                //     $classwork = $classroom->classworks()
                //         ->create($validate);

                //     $classwork->users()->attach($request->input('students'));
                // });

                $classwork = $classroom->classworks()
                    ->create($request->all());

                $classwork->users()->attach($request->input('students'));

                // dd($request->all());
            });
        } catch (QueryException $e) {
            return back()->with('error', $e->getMessage());
        }

        return redirect()
            ->route('classrooms.classworks.index', $classroom->id)
            ->with('succes', 'classwork craeted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom, classwork $classwork)
    {

        $submissions = Auth::user()
            ->Submission()
            ->where('classwork_id', $classwork->id)
            ->get();
        // if(){}
        // $invitation_link  = URL::signedRoute('classworks.link', [
        //     // $invitation_link  = URL::temporarySignedRoute('classrooms.join', now()->addHours(3) ,[
        //     'classroom' => $classroom->id,
        //     'classwork' => $classwork->id,
        // ]);
        $classwork->load('comments.user');

        return View::make('classworks.show', compact('classroom', 'classwork', 'submissions'));
        // ->with([
        //     'invitation_link' => $invitation_link,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Classroom $classroom, classwork $classwork)
    {
        $classwork = $classroom->classworks()
            ->findOrFail($classwork->id);
        $type = $classwork->type->value;

        $assigned = $classwork->users()
            ->pluck('id')
            ->toArray(); // تحول العنصر لاوبجكت

        return view('classworks.edit', compact('classroom', 'classwork', 'type', 'assigned'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom, classwork $classwork)
    {

        $type = $classwork->type;

        $validate =  $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'topic_id' => ['nullable', 'int', 'exists:topics,id'],
            'options.grade' => [Rule::requiredIf(fn () => $type == 'assignment' || 'question'), 'numeric', 'min:0'],
            'options.due' => ['nullable', 'date', 'after:published_at'],
        ]);

        $classwork->update($request->all());
        return View::make('classworks.show', compact('classroom', 'classwork'))
            ->with('success', 'Classwork Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom, classwork $classwork)
    {
        $classwork->delete();

        return redirect()->route('classrooms.classworks.index', $classroom->id)
            ->with('success', 'Classwork deleted');
    }

    // public function copyLink(Request $request, Classroom $classroom, classwork $classwork ,$link)
    // {

    //     // // $classwork = classwork::with([
    //     // //     'classwork' => $classwork->id,
    //     // // ]);

    //     // // Your copy link logic here

    //     // return response()->json(['message' => 'Link copied successfully']);
    //     $link = route('classwork.link'); // Replace with your link generation logic
    //     return view('classworks.show', compact('link', 'classroom', 'classwork'));
    // }

    // public function showUserProfile($userId, Classroom $classroom, classwork $classwork)
    // {
    //     $user = User::find($userId);

    //     $avatarUrl = Http::get('https://ui-avatars.com/api/?name=', [
    //         'name' => $user->name,
    //         'background' => '5EBEF5',
    //         'color' => 'fff',
    //         'rounded' => true,
    //         'size' => 64,
    //     ])->body();

    //     return View::make('classworks.show', compact('classroom', 'classwork', 'user', 'avatarUrl'));
    //     // return view('user.profile', compact());
    // }
}
