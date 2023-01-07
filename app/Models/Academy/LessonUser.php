<?php

namespace App\Models\Academy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'user_id',
        'course_id'
    ];
}
