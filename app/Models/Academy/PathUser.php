<?php

namespace App\Models\Academy;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PathUser extends Model
{
    protected $table = 'path_user';
    protected $fillable = [
        'id',
        'path_id',
        'user_id',
        'status'
    ];
    use HasFactory;
}
