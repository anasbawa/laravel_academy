<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use App\Models\Academy\Test;
use App\Models\TestUser;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index()
    {
        $academy = auth()->user();
        $tests = $academy->tests;

        return view('academy.dashboard.tests.index', [
            'tests' => $tests
        ]);
    }

    public function create()
    {
        $academy = auth()->user();
        $courses = $academy->courses;
        return view('academy.dashboard.tests.create', [
            'courses' => $courses
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:999',
            'course_id' => 'required',
            
        ]);
        $test = new Test();
        
        $test->name = $request->name;
        $test->course_id = $request->course_id;
        $test->active = 0;
        $test->academy_id = auth()->user()->id;

        $test->save();

        $academy = auth('academy')->user();


        $studentsIds = $academy->students->pluck('id');
        $test->students()->sync($studentsIds);


        return back()->with(['success', 'تمت الإضافة بنجاح']);
    }

    public function active(Request $request)
    {
        // dd($request->all());
        Test::where('id', $request->test_id)
        ->update(['active' => 1]);
        return back();
    }

    public function inActive(Request $request)
    {
        Test::where('id', $request->test_id)
        ->update(['active' => 0]);
        return back();
    }

}
