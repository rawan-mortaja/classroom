<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use League\CommonMark\Extension\Attributes\Node\Attributes;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // public function setMutatedAttribute($value)
    // {
    //     $this->attributes['email'] = strtolower($value);
    // }

    public function email(): Attribute
    {
        // return Attribute::make(
        //     null,
        //     function ($value) {
        //        return strtolower($value);
        //     }
        // );
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtolower($value),
        );
    }

    public function classrooms()
    {
        return $this->belongsToMany(
            Classroom::class, // Related model
            'classroom_user', // pivot table
            'user_id', // FK for current model in the pivot table
            'classroom_id', // FK for related model in the pivot table
            'id', // PK for current model
            'id', // PK for related model
        )->withPivot(['role', 'created_at']);
    }

    public function classworks()
    {
      return $this->belongsToMany(classwork::class)
        ->using(ClassworkUser::class)
        ->withPivot(['grade' , 'status' , 'submitted_at' , 'created_at']);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function Submission()
    {
        return $this->hasMany(Submission::class);
    }
}
