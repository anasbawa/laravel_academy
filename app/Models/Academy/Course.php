<?php

namespace App\Models\Academy;

use App\Models\Academy;
use App\Models\Admin\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'title',
        'description',
        'level',
        'published',
        'photo',
        'start_at',
        'end_at',
        'path_id',
        'befor_id',
        'instructor_id',
        'category_id',
        'academy_id'];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function path()
    {
        return $this->belongsTo(Path::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function test()
    {
        return $this->hasOne(Test::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
