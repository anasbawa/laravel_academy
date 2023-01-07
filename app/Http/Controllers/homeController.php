<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\Academy\Course;
use App\Models\Academy\Instructor;
use App\Models\Academy\Path;
use App\Models\Academy\Specialization;
use App\Models\Admin\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index()
    {
        $numCourses = Course::all()->count();
        $categories = Category::all();
        $academies = DB::table('academies')->select('id','name','email')->get();
        $paths = Path::inRandomOrder()->limit(6)->get();
        $courses = Course::inRandomOrder()->limit(4)->get();
        $instructors = Instructor::inRandomOrder()->limit(3)->get();
        $comments = Comment::inRandomOrder()->limit(3)->get();
        return view('home', [
            'categories' => $categories,
            'numCourses' => $numCourses,
            'academies' => $academies,
            'paths' => $paths,
            'courses' => $courses,
            'instructors' => $instructors,
            'comments' => $comments
        ]);
    }

    public function showAcademy($id, $name)
    {
        $academy = Academy::findOrFail($id);
        $paths = $academy->paths()->paginate(3);
        $specializations = $academy->specializations()->paginate(3);
        // dd($paths);
        return view('pages.academy', [
            'academy' => $academy,
            'paths' => $paths,
            'specializations' => $specializations
        ]);

    }

    public function showPaths($academy, $specialization)
    {
        $academy = Academy::find($academy);
        $specialization = Specialization::find($specialization);
        $paths = $specialization->paths;
        // dd($paths);
        return view('pages.paths', [
            'academy' => $academy,
            'specialization' => $specialization,
            'paths' => $paths
        ]);
    }

    public function showAcademies()
    {
        $academies = Academy::all();
        return view('pages.academies', compact('academies'));
    }

    public function allTeachers()
    {
        $instructors = Instructor::all();

        return view('pages.teachers.index', [
            'instructors' => $instructors
        ]);
    }

    public function showTeacher($id)
    {
        $instructor = Instructor::find($id);

        return view('pages.teachers.show', compact('instructor'));
    }

    public function allPaths()
    {
        $paths = Path::all();

        return view('pages.paths.index', compact('paths'));
    }

    public function showPath($id)
    {
        $path = Path::find($id);

        return view('pages.paths.show', [
            'path' => $path
        ]);
    }
}
