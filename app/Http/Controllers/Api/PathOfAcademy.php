<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use App\Models\Academy\Path;
use App\Models\Academy\Course;
use App\Models\Academy\Instructor;
use App\Models\Academy\Lesson;
use App\Models\Academy\Section;
use Illuminate\Http\Request;

class PathOfAcademy extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

                //get Path //

    public function index($pathId)
    {
        $path = Path::where('specialization_id',$pathId)->get();
       return response()->json([
        'path'=>$path
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

             //get Course //

    public function store($courseId)
    {
        $course = Course::where('path_id',$courseId)->get();
       return response()->json([
        'course'=>$course
    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


             //get Section//

    public function show($sectionId)
    {
        $section = Section::where('course_id',$sectionId)->get();
       return response()->json([
        'section'=>$section
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


              //get Lesson //

    public function update($lessonId)
    {
        $lesson = Lesson::where('section_id',$lessonId)->get();
       return response()->json([
        'lesson'=>$lesson
    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     // random Cours
    public function randomCours()
    {
        $courseRandom = Course::inRandomOrder()->limit(5)->get();
        return response()->json([
            'courseRandom'=>$courseRandom
        ]);
    }


    //random Academy
    public function randomAcademy()
    {
        $academyRandom = Academy::inRandomOrder()->limit(5)->get();
        return response()->json([
            'academyRandom'=>$academyRandom
        ]);
    }



    //random Instructor
    public function randomInstructor()
    {
        $instructorRandom = Instructor::inRandomOrder()->limit(5)->get();
        return response()->json([
            'instructorRandom'=>$instructorRandom
        ]);
    }


    //random Path
    public function randomPath()
    {
        $pathRandom = Path::inRandomOrder()->limit(5)->get();
        return response()->json([
            'pathRandom'=>$pathRandom
        ]);
    }
}
