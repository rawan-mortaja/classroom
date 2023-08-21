<?php

namespace App\Http\Controllers;

use App\Http\Requests\classroomRequest;
use App\Models\Classroom;
use App\Models\Scopes\UserClassroomScope;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\View as BaseView;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class classroomsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // ->only('index')
        // $this->authorizeResource(Classroom::class);
    }
    //
    public function index(Request $request): Renderable
    {
        // return response : view , redirect , json-data , file , String
        // return 'Hello World!';

        // $classrooms = Classroom::orderBy('Created_at', 'DESC')->get(); // return collection of Classroom
        // dd($classrooms);

        // $classrooms = DB::table('classrooms')
        //     ->whereNull('deleted_at')
        //     ->orderBy('Created_at', 'DESC')->get();

        // Use Local Scope

        $classrooms = Classroom::active()
            ->recent()
            ->orderBy('Created_at', 'DESC')
            // ->where('user_id', '=', Auth::id())
            // ->withoutGlobalScope(UserClassroomScope::class)
            // ->withoutGlobalScopes()
            ->get();


        //  session('success'); // return value session in the success
        //  session()->get('success');
        $success = session('success');

        // Session::put('success' , 'Whatever'); //بشكل دائم
        // Session::flash('success' , 'Whatever');// بشكل مؤقت

        // Session::remove('success');

        return view('classrooms.index', compact('classrooms', 'success'));

        // return view(
        //     'classrooms.index',
        //     [
        //         'name' => 'Rawan',
        //         'title' => 'Web Developer',
        //     ]
        // );



    }
    public function create()
    {
        return view('classrooms.create', [
            'classroom' => new Classroom(),
        ]);
    }


    public function store(classroomRequest $request): RedirectResponse
    {

        // $request->merge([
        //     'code' => Str::random(6)
        // ]); //تستخدم للحقول الغير موجودة بالجدول

        $validated = $request->validated();
        // // try {
        // $validated =  $request->validate([
        //     'code' => 'string',
        //     'name' => 'required|string|max:255', // roles
        //     'section' => 'nullable|string|max:255',
        //     'subject' => 'nullable|string|max:255',
        //     'room' => 'nullable|string|max:255',
        //     'cove_image' => [
        //         'nullable',
        //         'Image',
        //         Rule::dimensions([
        //             'min_width' => 600,
        //             'min_height' => 300,

        //         ]),
        //     ],
        // ]);

        // } catch (ValidationException $e) {
        //     return redirect()->back()
        //         ->withInput()
        //         ->withErrors($e->errors());
        // }

        // echo $request->input('name'); // url(head) | body
        // echo $request->post('name'); // body
        // echo $request->query('name') // url(head)
        // echo $request->get('name'); //url | body
        // echo $request->name; // url | body
        // echo $request['name'];
        // dd( $request->all()); //var_dump
        // dd( $request->only('name' , 'section'));
        // dd( $request->except('name' , 'section'));

        // Method 1
        // $classroom = new Classroom();
        // $classroom->name = $request->post('name');
        // $classroom->section = $request->post('section');
        // $classroom->subject = $request->post('subject');
        // $classroom->room = $request->post('room');
        // $classroom->code = Str::random(6);
        // $classroom->save(); //insert


        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image'); // UploadedFile
            // $file->getClientOriginalName();// Save imageName Original
            $path = Classroom::uploadCoverImage($file);

            // $path = $file->store('/covers', [
            //     'disk' => Classroom::$disk,
            // ]); // public || s3 || local

            // chooes name use : storeAs ('/covers' , 'name.png','uploads')
            // $request->merge([
            //     'cover_image_path' => $path,
            // ]);
            $validated['cover_image_path'] = $path;
        }

        // Method 2 : Mass assignment
        // $data = $request->all();
        // $data['code'] = Str::random(6);
        // $request->merge([
        //     'code' => Str::random(6)
        // ]); //تستخدم للحقول الغير موجودة بالجدول

        // $validated['code'] = Str::random(6);
        // $validated['user_id'] = Auth::user()->id; // Auth::id(), $request->user()->id()

        DB::beginTransaction();

        // DB::transaction(function () use ($validated) {
        //     $classroom = Classroom::create($validated);

        //     DB::table('classroom_user')->insert([
        //         'classroom_id' => $classroom->id,
        //         'user_id' => Auth::id(),
        //         'role' => 'teacher',
        //         'created_at' => now(),
        //     ]);
        // });

        // $validnated['user_id'] = Auth::id(); // Auth::user()->id , $request

        //  $classroom = new Classroom($request->all);
        //  $classroom->save();

        // $classroom = new Classroom($request->all);
        // $classroom->fill($request->all())
        //     ->save();

        try {
            $classroom = Classroom::create($validated);

            $classroom->join(Auth::id(), 'teacher');

            // DB::table('classroom_user')->insert([
            //     'classroom_id' => $classroom->id,
            //     'user_id' => Auth::id(),
            //     'role' => 'teacher',
            //     'created_at' => now(),
            // ]);

            DB::commit();
        } catch (QueryException $e) {
            DB::rollBack();
            return back()
                ->with('error', $e->getMessage())
                ->withInput();
        }




        // PRG : Post Redirect Get
        return redirect()->route('classrooms.index');
    }
    public function show(Classroom $classroom)
    {
        // $classroom = classroom::where('id' , '=' , $id)->first();
        // $classroom = Classroom::withTrashed()->findOrFail($id);
        // $classroom = Classroom::where('user_id' , Auth::id())->findOrFail($id);
        $invitation_link  = URL::signedRoute('classrooms.join', [
        // $invitation_link  = URL::temporarySignedRoute('classrooms.join', now()->addHours(3) ,[
            'classroom' => $classroom->id,
            'code' => $classroom->code,
        ]);

        // $classroom = Classroom::find($id);
        return View::make('classrooms.show')
            ->with([
                'classroom' => $classroom,
                'invitation_link' => $invitation_link,
            ]);
    }

    public function edit($id)
    {

        $classroom = Classroom::find($id);
        return view('classrooms.edit', [
            'classroom' => $classroom,
        ]);
    }

    public function update(classroomRequest $request, Classroom $classroom)
    {

        //لا احتاج الي عمل vlidtion لانه هيتم استدعاء ملف ال Rules الذي تم انشائه في مجلد publish

        $validated =  $request->validated();
        // $rules = [
        //     'name' => 'required|string|max:255', // roles
        //     'section' => 'nullable|string|max:255',
        //     'subject' => 'nullable|string|max:255',
        //     'room' => 'nullable|string|max:255',
        //     'cove_image' => [
        //         'nullable',
        //         'Image',
        //         'max:1' ,// 1 kelo = 1024
        //         Rule::dimensions([
        //             'min_width' => 600,
        //             'min_height' => 300,

        //         ]),
        //     ],
        // ];

        // $messages = [
        //     'required' => ':attribute Important!', // :attribute > لطباعة اسم الحقل
        //     'name.required' => 'The name is required !',
        //     'cover_image_path' => 'Image size is great that 1M'
        // ];

        // $validated =  $request->validate($rules, $messages);


        // $classroom = Classroom::find($id);
        // $classroom->name = $request->post('name');
        // $classroom->section = $request->post('section');
        // $classroom->subject = $request->post('subject');
        // $classroom->room = $request->post('room');
        // $classroom->code = Str::random(6);
        // $classroom->save(); //update


        //Store Image In Folder
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image'); // UploadedFile
            // $file->getClientOriginalName();// Save imageName Original

            // Solution 1
            // $name = $classroom->cover_image_path ?? (Str::random(40) . '.' . $file->getClientOriginalExtension());
            // $path = $file->storeAs('/covers', basename($name), [
            //     'disk' => 'public',
            // ]); // public || s3 || local


            // Solution 2
            $path = Classroom::uploadCoverImage($file);


            // chooes name use : storeAs ('/covers' , 'name.png','uploads')
            // $request->merge([
            //     'cover_image_path' => $path,
            // ]);
            $validated['cover_image_path'] = $path;
        }

        // Contiune Solution 2
        $old = $classroom->cover_image_path;
        // Mass assignment
        $classroom->update($validated);

        if ($old && $old != $classroom->cover_image_path) {
            Classroom::deleteCoverImage($old);
            // Storage::disk(Classroom::$disk)->delete($old);
        }


        // $classroom->fill($request->all())->save();
        Session::flash('success', 'Classroom update');
        Session::flash('error', 'Error!');
        return Redirect::route('classrooms.index');
        // ->with('success', 'Classroom updated')
        // ->with('error', 'Error');
    }

    public function destroy(Classroom $classroom)
    {
        // $classroom = Classroom::findOrFail($id);
        // $classroom->destroy($id);

        // Classroom::where('id' , '=' , $id)->delete();

        // $classroom = Classroom::find($classroom);
        $classroom->delete();

        //Flash Messages | تعتمد على seesion

        // Classroom::deleteCoverImage($classroom->cover_image_path);

        return redirect(route('classrooms.index'))
            ->with('success', 'Classroom deleted');
    }

    public function trashed()
    {
        $classroom = Classroom::onlyTrashed()
            ->latest('deleted_at')
            ->get();
        //onlyTrashed() ; فقط المحذوف(ألموجود بالسلة)
        return view('classrooms.trashed', compact('classroom'));
    }

    public function restore($id)
    {
        $classroom = Classroom::onlyTrashed()
            ->findOrFail($id);
        $classroom->restore();

        return redirect()
            ->route('classrooms.index')
            ->with('success', "Classroom  ({ $classroom->name }) restores");
    }

    public function forcedelete($id)
    {
        $classroom = Classroom::withTrashed()->findOrFail($id);
        //withTrashed() ; المحذوفة و غير محذوفة
        $classroom->forceDelete();
        // Classroom::deleteCoverImage($classroom->cover_image_path);
        //forceDelete(); حذف بشكل نهائي

        return redirect()
            ->route('classrooms.trashed')
            ->with('success', "Classroom  ({ $classroom->name }) deleted forever");
    }
}
