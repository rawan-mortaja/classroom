<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Classroom;
use App\Models\classwork;
use App\Models\Scopes\UserClassroomScope;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Define Gates (abilties)

        // Gate::before(function (User $user, $ability) {
        //     if ($user->super_admin) {
        //         return true;
        //     }
        // });

        /*   Gate::define('classworks.view', function (User $user, classwork $classwork) { //first option (crrunt) | Scound option ()
            $teacher = $user->classrooms()
                ->withoutGlobalScope(UserClassroomScope::class)
                ->wherePivot('classroom_id', '=', $classwork->classroom_id)
                ->wherePivot('role', '=', 'teacher')
                ->exists();

            $assigned = $user->classworks()
                ->wherePivot('classwork_id', '=', $classwork->id)
                ->exists();

            return ($teacher || $assigned);
                // ? Response::allow()
                // : Response::deny('You are not assigned to this classwork.');
            // return true;
        });

        Gate::define('classworks.create', function (User $user, Classroom $classroom) { //first option (crrunt) | Scound option ()
            $result = $user->classrooms()
                ->withoutGlobalScope(UserClassroomScope::class)
                ->wherePivot('classroom_id', '=', $classroom->id)
                ->wherePivot('role', '=', 'teacher')
                ->exists();

            return $result
                ? Response::allow()
                : Response::deny('You are not a teacher in this classroom.');
        });


        Gate::define('classworks.update', function (User $user, classwork $classwork) { //first option (crrunt) | Scound option ()
            return $classwork->uaer_id == $user->id && $user->classrooms()
                ->wherePivot('classroom_id', '=', $classwork->classroom_id)
                ->wherePivot('role', '=', 'teacher')
                ->exists();
            // return true;
        });

        Gate::define('classworks.delete', function (User $user, classwork $classwork) { //first option (crrunt) | Scound option ()
            return  $classwork->uaer_id == $user->id && $user->classrooms()
                ->wherePivot('classroom_id', '=', $classwork->classroom_id)
                ->wherePivot('role', '=', 'teacher')
                ->exists();
            // return true;
        });

        Gate::define('submissions.create', function (User $user, classwork $classwork) {
            $teacher = $user->classrooms()
                ->wherePivot('classroom_id', '=', $classwork->classroom_id)
                ->wherePivot('role', '=', 'teacher')
                ->exists();
            if ($teacher) {
                return false;
            }
            return $user->classworks()
                ->wherePivot('classwork_id', '=', $classwork->id)
                ->exists();
        });*/
    }
}
