<?php

namespace App\Models\Academy;

use App\Models\Academy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademyUser extends Model
{
    protected $table = 'academy_user';
    protected $fillable = [
        'id',
        'academy_id',
        'user_id',
        'status'
    ];
    use HasFactory;
}
