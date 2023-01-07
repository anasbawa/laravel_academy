<?php

namespace App\Models;

use App\Models\Academy\Course;
use App\Models\Academy\Instructor;
use App\Models\Academy\Path;
use App\Models\Academy\Specialization;
use App\Models\Academy\Test;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Academy extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'academy';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password'
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

    public function instructors()
    {
        return $this->hasMany(Instructor::class);
    }

    public function specializations()
    {
        return $this->hasMany(Specialization::class, 'academy_id');
    }

    public function paths()
    {
        return $this->hasManyThrough(Path::class, Specialization::class, 'academy_id', 'specialization_id', 'id', 'id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}
