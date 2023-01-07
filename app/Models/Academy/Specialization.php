<?php

namespace App\Models\Academy;

use App\Models\Academy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specialization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'academy_id'
    ];

    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }

    public function paths()
    {
        return $this->hasMany(Path::class);
    }

    public function instructors()
    {
        return $this->hasMany(Instructor::class);
    }
}
