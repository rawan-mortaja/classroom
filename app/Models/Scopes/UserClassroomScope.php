<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserClassroomScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if ($id = Auth::id()) {
            $builder
                ->where(function (Builder $query) use ($id) {
                    $query->where('user_id', '=', $id)
                        ->orWhereExists(function (QueryBuilder $query) use ($id) {
                            $query->select(DB::raw('1'))
                                ->from('classroom_user')
                                ->whereColumn('classroom_id', '=' ,  'classrooms.id')
                                ->where('user_id', '=', $id);
                        });
                });

            // ->orwhereRow('exisits (select 1 from classroom_user where classroom_id =classrooms.id , [
            //     $id
            // ]);

        }
    }

    // Select * from Classrooms
    // where user_id = ?
    // or classroom.id in (select classroom_id from classroom_user where user_id = ?)
}
