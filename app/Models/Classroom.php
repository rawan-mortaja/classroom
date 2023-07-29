<?php

namespace App\Models;

use App\Models\Scopes\UserClassroomScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Classroom extends Model
{
    use HasFactory;


    public static  string $disk = 'public';

    protected $fillable = [
        'name', 'section', 'subject', 'room', 'theme',
        'cover_image_path', 'code'
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

        return Storage::disk(Classroom::$disk)->delete($path);
    }

    public static function booted()
    {
        //	static::addGlobalScope('user',function(Builder $query){
        //			$query->where('user_id', '=' , Auth::id());
        //	});

        //استدعاء global scope classes
        static::addglobalScope(new UserClassroomScope);
    }
}
