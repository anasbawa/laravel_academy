<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use App\Models\Academy\Attachement;
use App\Models\Academy\Course;
use App\Models\Academy\Lesson;
use App\Models\Academy\LessonUser;
use App\Models\Academy\Section;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academy = auth()->user();
        $courses = $academy->courses;

        return view('academy.dashboard.lessons.create', [
            'courses' => $courses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:191',
            'description' => 'required|max:191',
            'video' => 'required',
            'start_at' => 'required|date|after_or_equal:now',
            'section_id' => 'required',
            'course_id' => 'required',
            'file' => 'required|mimes:pdf',

        ]);
        $lesson = new Lesson;

        $lesson->title = $request->title;
        $lesson->description = $request->description;
        $lesson->video = $request->video;
        $lesson->start_at = $request->start_at;
        $lesson->status = 0;
        $lesson->section_id = $request->section_id;
        $lesson->course_id = $request->course_id;

        if ($request->hasFile('file')) {

            $lesson_id = Lesson::latest()->first()->id;
            $attach = $request->file('file');
            $extension = $attach->getClientOriginalName();
            $file_name =  time().'.'.$extension;


            $attachments = new Attachement;
            $attachments->name = $file_name;
            $attachments->lesson_id = $lesson_id;
            $attachments->save();

            // move file
            $fileName = $request->file->getClientOriginalName();
            $request->file->move(public_path('Academy/Lesson/Attachments/'), $fileName);
        }

        $code = time().$request->course_id . $request->section_id . '.png';
        $lesson->code = $code;
        $lesson->save();

        $body = $lesson_id . '/' . $lesson->course->id;
        $qr = QrCode::format('png');
        $qr->size(500);
        $qr->generate($body, public_path('QRcode/' . $code));


        return redirect()->back()->with(['success' => 'تمت إضافة الجلسة بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::findOrfail($id);
        return view('academy.dashboard.lessons.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getsections(Request $request)
    {
        $sections = DB::table('sections')
        ->where('course_id', $request->course_id)
        ->get();

        if (count($sections) > 0) {
            return response()->json($sections);
        }
    }

    public function changeStatus(Request $request)
    {
        Lesson::where('id', $request->lesson_id)
        ->update(['status' => 1]);
        return back();
    }

    public function attendence(Request $request)
    {
        // dd($request);
       LessonUser::create($request->all());

       return back();

    }
}
