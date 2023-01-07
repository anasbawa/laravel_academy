<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Academy\Course;
use App\Models\Academy\Lesson;
use App\Models\CourseUser;
use App\Models\TestUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function show($id)
    {

        $course = Course::findOrFail($id);
        $sections = $course->sections;
        $attendence = DB::table('lesson_users')
        ->where('course_id', $id)
        ->where('user_id', 6)
        ->count();

        $lessons = $course->lessons()->count();


        if (($attendence / $lessons)*100 >= $course->attendence_rate) {
            $status = true;
        }
        else {
            $status = false;
        }

        $before_id = $course->before_id;
        if ($before_id) {
            $before_course = Course::find($before_id);
            $test_id = $before_course->test->id;
                $stat = TestUser::where('test_id', $test_id)
                ->where('user_id', auth('web')->user()->id)
                ->first();
                $result = $stat->status;
                if ($result == 0)
                {
                    return view('student.dashboard.course.inactiveCourse', [
                        'course' => $course,
                        'before_course' => $before_course
                    ]);
                }
        }



        return view('student.dashboard.course.show', [
            'course' => $course,
            'sections' => $sections,
            'status' => $status
        ]);
    }

    public function showLesson($id)
    {
        $lesson = Lesson::find($id);
        $lesson_user = DB::table('lesson_users')->where('lesson_id', $id)->where('user_id', auth('web')->user()->id)->first();
        if($lesson->status == 0){
            return view('student.dashboard.course.inactiveLesson',[
                'lesson' => $lesson
            ]);
        }

        return view('student.dashboard.course.lesson', [
            'lesson' => $lesson,
            'lesson_user' => $lesson_user
        ]);
    }

    public function download($file_name)
    {
        return response()->download(public_path('Academy/Lesson/Attachments/' . $file_name));
    }
}
