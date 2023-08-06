<?php

namespace App\Models;

use App\Models\Scopes\UserClassroomScope;
use App\Observers\ClassroomObserver;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Static_;

class Classroom extends Model
{
    use HasFactory, SoftDeletes;


    public static  string $disk = 'public';

    protected $fillable = [
        'name', 'section', 'subject', 'room', 'theme',
        'cover_image_path', 'code', 'user_id',
    ]; // تحديد المسموح (white list)



    // protected $guarded = ['id'];// تحديد الممنوع (Black list)


    public function getRouteKeyName() //تحديد نوع partmeter يلي هتاخده
    {
        return 'id';
    }

    public static function uploadCoverImage($file)
    {

        $path = $file->store('/covers', [
            'disk' => static::$disk,
        ]);

        return $path;
    }

    public static function deleteCoverImage($path)
    {
        if (!$path || !Storage::disk(Classroom::$disk)->exists($path)) {
            return;
        }
        return Storage::disk(Classroom::$disk)->delete($path);
    }

    public function scopeActive(Builder $query)
    {
        $query->where('status', '=', 'active');
    }
    //لما اجي استدعيها بستدعيها ب اسم active من غير scope

    public function scopeRecent(Builder $query)
    {
        $query->orderBy('updated_at', 'DESC');
    }

    public function scopeStatus(Builder $query, $status = 'active')
    {
        $query->where('status', '=', $status);
    }

    public static function booted()
    {

        static::observe(ClassroomObserver::class);


        // parent::boot(); //لو استخدمت فنكشن boot لازم اعمل استدعاء للبيرنت
        //	static::addGlobalScope('user',function(Builder $query){
        //			$query->where('user_id', '=' , Auth::id());
        //	});

        //استدعاء global scope classes
        static::addglobalScope(new UserClassroomScope);

        //Creating , Created , Updating , Updated , Saving , Saved
        // Deleting , deleted , Restroing , Restored , ForceDeleting , ForceDeleted
        //Retrieved

        // static::created(function (Classroom $classroom) {
        //     $classroom->code = Str::random(8);
        //     $classroom->user_id = Auth::id();
        // });

        // static::forceDeleted(function (Classroom $classroom) {
        //     static::deleteCoverImage($classroom->cover_image_path);
        // });

        // static::deleted(function (Classroom $classroom) {
        //     $classroom->status = 'deleted';
        //     $classroom->save();
        // });

        // static::restored(function (Classroom $classroom) {
        //     $classroom->status = 'active';
        //     $classroom->save();
        // });
    }

    public function classworks(): HasMany
    {
        return $this->hasMany(classwork::class, 'classroom_id', 'id');
    }

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class, 'classroom_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class, // Related model
            'classroom_user', // pivot table
            'classroom_id', // FK for current model in the pivot table
            'user_id', // FK for related model in the pivot table
            'id', // PK for current model
            'id', // PK for related model
        )->withPivot(['role', 'created_at']);
        // ->as('Join');
        //->wherePivot('role' , '=' , 'teacher');
    }

    public function createdClassrooms()
    {
        return $this->hasMany(Classroom::class, 'user_id');
    }
    public function teachers()
    {
        return $this->users()->wherePivot('role', '=', 'teacher');
    }
    public function students()
    {
        return $this->users()->wherePivot('role', '=', 'student');
    }

    public function join($user_id, $role = 'student')
    {
        // use relationship many to many
        return $this->users()->attach($user_id, [
            'role' => $role,
            'created_at' => now(),
        ]); // INSERT

        
        // return DB::table('classroom_user')->insert([
        //     'classroom_id' => $this->id,
        //     'user_id' => $user_id,
        //     'role' => $role,
        //     'created_at' => now(),
        // ]);


    }

    //get{ATTRIBUTENAME}Attribute
    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    // public function getCoverImagePathAttribute($value)
    // {
    //     if($this->cover_image_path){
    //         return  Storage::disk('public')->url($this);
    //         // asset('storage/' . $va);
    //     }

    //     return 'https://placehold.co/800x300';
    // }

    public function getUrlAttribute()
    {
        return route('classrooms.show', $this->id);
    }
}
