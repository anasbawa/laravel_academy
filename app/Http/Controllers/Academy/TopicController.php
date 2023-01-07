<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use App\Models\Academy\Test;
use App\Models\Academy\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    public function index()
    {
        $academy = auth()->user();
        $tests = $academy->tests;

        return view('academy.dashboard.tests.topics.index', [
            'tests' => $tests
        ]);
    }

    public function create($id)
    {
        $test = Test::find($id);
        // dd($test);
        // $academy = auth()->user();
        // $tests = $academy->tests;
        return view('academy.dashboard.tests.topics.create', [
            'test' => $test
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:191',
        ]);
        // dd($request);
        $topic = new Topic();
        $topic->name = $request->name;
        $topic->test_id = $request->test_id;

        $topic->save();

        return redirect()->route('tests.index')->with(['success', 'تمت الإضافة بنجاح']);
    }
}
