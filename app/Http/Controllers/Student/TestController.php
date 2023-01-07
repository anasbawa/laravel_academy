<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Academy\Option;
use App\Models\Academy\Test;
use App\Models\CourseUser;
use App\Models\TestUser;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function show($id)
    {
        $test = Test::find($id);

        $test_user = TestUser::where('test_id', $test->id)
        ->where('user_id', auth('web')->user()->id)->first();

        $result = $test_user->total_points;
        $status = $test_user->status;
        $total = $test->options->sum('points'); // Total points for the exam

        if ($test_user->status == 1){
            return view('student.tests.result', [
                'result' => $result,
                'total' => $total,
                'status' => $status,
                'test' => $test
            ]);
        }

        return view('student.tests.show', [
            'test' => $test
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $options = Option::find(array_values($request->input('questions')));
        $result = $options->sum('points'); // The finish result of the student

        // $test_user =  TestUser::where('test_id', $request->test_id)
        // ->where('user_id', auth('web')->user()->id)
        // ->first();


        // $test_user->total_points = $result;
        // $marks->save();
        $test = Test::find($request->test_id);
        $total = $test->options->sum('points'); // Total points for the exam

        if($result / $total >= 0.6){
            $status = 1;
            $status = true;
        } else {
            $status = 0;
            $status = false;
        }



        TestUser::where('test_id', $request->test_id)
        ->where('user_id', auth('web')->user()->id)->update([
            'total_points' =>  $result,
            'status' => $status
        ]);


        // $test_user->save();



        // $course_user = new CourseUser();
        // $pivots = CourseUser::where('user_id', auth('web')->user()->id)->get();
        // foreach($pivots as $pivot){
        //     if ($pivot->test_id == $request->test_id){
        //         if ($status) {
        //             $pivot->status = 1;
        //         } else {
        //             $pivot->status = 0;
        //         }

        //         $pivot->save();
        //     }
        // }




        // dd('done');
        return view('student.tests.result', [
            'result' => $result,
            'total' => $total,
            'status' => $status
        ]);

    }
}
