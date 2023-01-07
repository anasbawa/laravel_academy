<?php

namespace App\Models\Academy;

use App\Models\Academy;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Path extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'specialization_id'
    ];

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function academy()
    {
        return $this->BelongsTo(Academy::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class);
    }
}
