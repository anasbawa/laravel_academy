<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use App\Models\Academy\Course;
use App\Models\Academy\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
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
    public function create(Request $request)
    {
        $course_id = $request->course_id;
        $course_name = Course::where('id', $course_id)->pluck('title')->first();
        // dd($course_name);
        return view('academy.dashboard.sections.create',[
            'course_id' => $course_id,
            'course_name' => $course_name
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
            'order' => 'required|max:11',

        ]);
        $section = new Section;

        $section->title = $request->title;
        $section->order = $request->order;
        $section->course_id = $request->course_id;

        $section->save();
        return redirect()->back()->with(['success', 'تمت الإضافة بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::find($id);
        $course_id = $section->course->id;
        $course_name = Course::where('id', $course_id)->pluck('title')->first();
        // dd($course_name);
        return view('academy.dashboard.sections.edit',[
            'course_id' => $course_id,
            'course_name' => $course_name,
            'section' => $section
        ]);
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
        $validated = $request->validate([
            'title' => 'required|max:191',
            'order' => 'required|max:11',

        ]);
        $section = Section::find($id);
        $section->title = $request->title;
        $section->order = $request->order;
        $section->course_id = $request->course_id;

        $section->update();
        return redirect()->back()->with(['success', 'تمت عملية التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Section::findOrFail($id)->delete();
        return redirect()->back()->with(['success' => 'تمت الحذف بنجاح']);
    }
}
