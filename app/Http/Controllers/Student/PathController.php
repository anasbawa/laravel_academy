<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Academy\Path;
use Illuminate\Http\Request;

class PathController extends Controller
{
    public function index()
    {
        $student = auth()->user();
        $paths = $student->paths;

        return view('student.dashboard.paths.index', [
            'paths' => $paths
        ]);
    }

    public function show($id)
    {
        
        $path = Path::findOrfail($id);
        $courses = $path->courses;
        // dd($courses);
        return view('student.dashboard.paths.show', [
            'path' => $path,
            'courses' => $courses
        ]);
    }
}
