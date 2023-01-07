<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use App\Models\Academy\Question;
use App\Models\Academy\Topic;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function index($id)
    {
        $topic = Topic::find($id);

        return view('academy.dashboard.tests.questions.index', [
            'topic' => $topic
        ]);
    }

    public function create($id)
    {
        $topic = Topic::find($id);
        // dd($topic);
        return view('academy.dashboard.tests.questions.create', [
            'topic' => $topic
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question_text' => 'required|max:255',
            
        ]);
        // dd($request);
        $question = new Question();
        $question->question_text = $request->question_text;
        $question->topic_id = $request->topic_id;

        $question->save();

        return redirect()->route('topics.index')->with(['success', 'تمت الإضافة بنجاح']);
    }
}
