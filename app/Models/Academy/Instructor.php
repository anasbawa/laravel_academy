<?php

namespace App\Models\Academy;

use App\Models\Academy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'specialization',
        'specialization_id',
        'academy_id',
        'twitter',
        'facebook',
        'github',
        'photo'
    ];

    public function special()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    
}
