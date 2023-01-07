<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use App\Models\Academy\Option;
use App\Models\Academy\Question;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function index($id)
    {

    }

    public function create($id)
    {
        $question = Question::find($id);

        return view('academy.dashboard.tests.options.create', [
            'question' => $question
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'option_text' => 'required|max:255',
            'points' => 'required|max:11',

        ]);
        $option = new Option();

        $option->option_text = $request->option_text;
        $option->points = $request->points;
        $option->question_id = $request->question_id;
        $option->test_id = $request->test_id;

        $option->save();

        return back()->with(['success', 'تمت الإضافة بنجاح']);
    }
}
