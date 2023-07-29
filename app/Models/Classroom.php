<?php

namespace App\Models;

use App\Models\Scopes\UserClassroomScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Classroom extends Model
{
    use HasFactory, SoftDeletes;


    public static  string $disk = 'public';

    protected $fillable = [
        'name', 'section', 'subject', 'room', 'theme',
        'cover_image_path', 'code' , 'user_id' , 
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
        //	static::addGlobalScope('user',function(Builder $query){
        //			$query->where('user_id', '=' , Auth::id());
        //	});

        //استدعاء global scope classes
        static::addglobalScope(new UserClassroomScope);
    }
}
