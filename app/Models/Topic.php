<?php

namespace App\Models;

use App\Models\Scopes\topicsScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

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

    public function classworks(): HasMany
    {
        return $this->hasMany(classwork::class, 'topic_id', 'id');
    }

    public function classrooms(): BelongsTo
    {
        return $this->BelongsTo(Classroom::class, 'classroom_id', 'id');
    }
}
