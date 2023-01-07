<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use App\Models\Academy\AcademyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function register(Request $request)
    {
       $register = new AcademyUser;

       $register->academy_id = $request->academy_id;
       $register->user_id = $request->student_id;
       $register->status = 0;

       $register->save();

       return back()->with(['success', 'تم إرسال الطلب بجاح']);
    }

    public function showStudents()
    {
        $academy = Auth::guard('academy')->user();
        // $students = AcademyUser::where('academy_id', auth()->user()->id)->where('status', '=', '0');
                // dd($students);
        $students = $academy->students->where('status', '!=', '1');
        return view('academy.dashboard.students.index', [
            'students' => $students
        ]);
        // dd($students);
    }

    public function rejectStudent($id)
    {
       ;
        $pivots = AcademyUser::where('user_id', $id)->get();
        foreach($pivots as $pivot){
            if ($pivot->academy_id == auth()->user()->id){
                $pivot->delete();
            }
        }
        return back()->with(['success', 'تم الرفض بنجاح']);
    }

    public function acceptStudent(Request $request)
    {

        $pivots = AcademyUser::where('user_id', $request->student_id)->get();
        foreach($pivots as $pivot){
            if ($pivot->academy_id == auth()->user()->id){
                $pivot->status = 1;
                $pivot->update();
            }
        }
        return back()->with(['success', 'تم القبول بنجاح']);
    }

    
}
