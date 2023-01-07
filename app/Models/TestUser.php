<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestUser extends Model
{
    protected $table = 'test_users';

    protected $fillable = [
        'user_id',
        'test_id',
        'total_points',
        'status'
    ];
    use HasFactory;
}
