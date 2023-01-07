<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AcademyController extends Controller
{
    public function index()
    {
        $student = auth()->user();
        $academies = $student->academies;

        return view('student.dashboard.academies', [
            'academies' => $academies
        ]);
    }
}
