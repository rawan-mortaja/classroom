<?php

namespace App\Models;

use App\Models\Scopes\topicsScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'classroom_id', 'user_id'
    ]; // تحديد المسموح (white list)


    public static function booted()
    {
        //	static::addGlobalScope('user',function(Builder $query){
        //			$query->where('user_id', '=' , Auth::id());
        //	});

        //استدعاء global scope classes
        static::addglobalScope(new topicsScope);
    } 
}
