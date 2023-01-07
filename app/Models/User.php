<?php

namespace App\Models;

use App\Models\Academy\Course;
use App\Models\Academy\Lesson;
use App\Models\Academy\Path;
use App\Models\Academy\Test;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
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
    ];

    public function academies()
    {
        return $this->belongsToMany(Academy::class);
    }

    public function paths()
    {
        return $this->belongsToMany(Path::class);
    }

    public function lessons()
    {
        return $this->belongsToMany(Lesson::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function students()
    {
        return $this->belongsToMany(
            User::class,
            'test_users',
            'user_id',
            'test_id',
            'id',
            'id'
        );
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
