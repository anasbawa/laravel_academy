<?php

namespace App\Models\Academy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;


    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function attachements()
    {
        return $this->hasMany(Attachement::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }
}
