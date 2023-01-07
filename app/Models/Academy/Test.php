<?php

namespace App\Models\Academy;

use App\Models\Academy;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function students()
    {
        return $this->belongsToMany(
            User::class,
            'test_users',
            'test_id',
            'user_id',
            'id',
            'id'
        );
    }
}
