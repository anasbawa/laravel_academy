<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use App\Models\Academy\Course;
use App\Models\Academy\Path;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $academy = auth()->user();
        $courses = $academy->courses;
        return view('academy.dashboard.courses.index', compact('courses'));
    }

    public function create()
    {
        $academy = Auth()->user();
        $instructors = $academy->instructors;
        $paths = $academy->paths;
        $categories = Category::all();
        // dd($paths);
        return view('academy.dashboard.courses.create', [
            'paths' => $paths,
            'categories' => $categories,
            'instructors' => $instructors
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:191',
            'description' => 'required|max:191',
            'instructor_id' => 'required',
            'start_at' => 'required|date|after_or_equal:now',
            'end_at' => 'required|date|after_or_equal:start_at',
            'category_id' => 'required',
            'path_id' => 'required',
            'published' => 'required',
            'attendence_rate' => 'required',
            'pass_rate' => 'required'
        ]);
        $course = new Course;

        $course->title = $request->title;
        $course->description = $request->description;
        $course->instructor_id = $request->instructor_id;
        $course->start_at = $request->start_at;
        $course->attendence_rate = $request->attendence_rate;
        $course->pass_rate = $request->pass_rate;
        $course->end_at = $request->end_at;
        if ($request->published) {
            $course->published = 1;
        }
        else {
            $course->published = 0;
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('images/courses', $file_name);
            $course->photo = $file_name;
        }
        $course->category_id = $request->category_id;
        $course->path_id = $request->path_id;
        $course->before_id = $request->before_id;
        $course->academy_id = auth()->user()->id;

        $course->save();

        return redirect()->back()->with(['success', 'تمت الإضافة بنجاح']);

    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        $attendence = DB::table('lesson_users')
        ->where('course_id', $id)
        ->where('user_id', 1)
        ->count();
        return view('academy.dashboard.courses.show', [
            'course' => $course,
            'attendence' => $attendence
        ]);
    }

    public function edit($id)
    {
        $course = Course::find($id);
        $academy = Auth()->user();
        $instructors = $academy->instructors;
        $paths = $academy->paths;
        $categories = Category::all();
        // dd($paths);
        return view('academy.dashboard.courses.edit', [
            'paths' => $paths,
            'categories' => $categories,
            'instructors' => $instructors,
            'course' => $course
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:191',
            'description' => 'required|max:191',
            'instructor_id' => 'required',
            'start_at' => 'required|date|after_or_equal:now',
            'end_at' => 'required|date|after_or_equal:start_at',
            'category_id' => 'required',
            'path_id' => 'required',
            'published' => 'required',
            'attendence_rate' => 'required',
            'pass_rate' => 'required'
        ]);
        $course = Course::find($id);

        $course->title = $request->title;
        $course->description = $request->description;
        $course->instructor_id = $request->instructor_id;
        $course->start_at = $request->start_at;
        $course->attendence_rate = $request->attendence_rate;
        $course->pass_rate = $request->pass_rate;
        $course->end_at = $request->end_at;
        if ($request->published) {
            $course->published = 1;
        }
        else {
            $course->published = 0;
        }

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('images/courses', $file_name);
            $course->photo = $file_name;
        }
        $course->category_id = $request->category_id;
        $course->path_id = $request->path_id;
        $course->before_id = $request->before_id;
        $course->academy_id = auth()->user()->id;

        $course->update();

        return redirect()->back()->with(['success', 'تمت عملية التعديل بنجاح']);
    }

    public function destroy($id)
    {
        Course::findOrFail($id)->delete();
        return redirect()->back()->with(['success' => 'تمت الحذف بنجاح']);
    }

    public function getcourses(Request $request)
    {
        $courses = DB::table('courses')
        ->where('path_id', $request->path_id)
        ->get();

        if (count($courses) > 0) {
            return response()->json($courses);
        }
    }

    public function enablePublished(Request $request)
    {
        Course::where('id', $request->course_id)
        ->update(['published' => 1]);
        return back();
    }

    public function disablePublished(Request $request)
    {
        Course::where('id', $request->course_id)
        ->update(['published' => 0]);
        return back();
    }
}
