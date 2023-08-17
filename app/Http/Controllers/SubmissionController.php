<?php

namespace App\Http\Controllers;

use App\Models\classwork;
use App\Models\ClassworkUser;
use App\Models\Submission;
use App\Rules\ForbiddenFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

class SubmissionController extends Controller
{
    public function store(Request $request, classwork $classwork)
    {
        $request->validate([
            'files' => 'required|array',
            'files.*' => ['file', new ForbiddenFile('text/x-php', 'application/x-http-php', 'application/x-msdownload')],
        ]);

        $assigned =  $classwork->users()->where('id', Auth::id())->exists();

        if (!$assigned) {
            abort(403);
        }

        DB::beginTransaction();
        try {
            foreach ($request->file('files') as $file) {
                // $file->store;
                $data[] = [
                    'user_id' => Auth::id(),
                    'classwork_id' => $classwork->id,
                    'content' => $file->store("submissions/{$classwork->id}"),
                    'type' => 'file',
                    // 'created_at' => now(),
                    // 'updated_at' => now(),
                ];
            }
            $user = Auth::user();
            $user->Submission()->createMany($data);

            ClassworkUser::where([
                'user_id' => $user->id,
                'classwork_id' => $classwork->id,
            ])->update([
                'status' => 'submitted',
                'submitted_at' => now(),

            ]); //code...
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }


        return back()->with('success', 'Work submitted');
    }

    public function file(Submission $submission)
    {
        $user = Auth::user();
        // Check if the user is Classroom teacher

        /*
            SELECT * FROM classroom_user
            WHERE user_id = ?
            AND role = teacher
            AND EXIXTS (
                SELECT 1 FROM classworks WHERE classworks.classroom_id = classroom_user.classroom_id
                And EXIXTS (
                    SELECT 1 FROM submissions WHERE submissions.classwork_id = classworks.id id = ?
                )
            )
        */

        $collection = DB::select('
                 SELECT * FROM classroom_user
                    WHERE user_id = ?
                    AND role = ?
                    AND EXISTS (
                        SELECT 1 FROM classworks WHERE classworks.classroom_id = classroom_user.classroom_id
                        And EXISTS (
                             SELECT 1 FROM submissions WHERE submissions.classwork_id = classworks.id AND id = ?
                        )
                 )', [$user->id, 'teacher', $submission->id]);

        // dd($collection);
        $isTeacher = $submission
            ->classwork
            ->classroom
            ->teachers()
            ->where('id', $user->id)
            ->exists();

        $isOwner = $submission->user_id == $user->id;

        if (!$isTeacher && !$isOwner) {
            abort(403);
        }

        // return Storage::disk('local')->download($submission->content);
        // return response()->download(storage_path('app/' . $submission->content));
        return response()->file(storage_path('app/' . $submission->content));
    }
}
