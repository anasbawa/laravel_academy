<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Academy\Instructor;
use App\Models\Academy\Specialization;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = Instructor::all();
        return view('academy.dashboard.instructor.index', [
            'instructors' => $instructors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academy = Auth()->user();
        $specializations = $academy->specializations;
        return view('academy.dashboard.instructor.create', compact('specializations'));
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
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email' => 'required|unique:email|email',
            'about' => 'required|date,|after_or_equal:now',
            'specialization_id' => 'required|date|after_or_equal:start_at',
            'specialization' => 'required',

        ]);
        $instructor = new Instructor();
        $instructor->first_name = $request->input('first_name');
        $instructor->last_name = $request->input('last_name');
        $instructor->email = $request->input('email');
        $instructor->about = $request->input('about');
        $instructor->academy_id = auth()->user()->id;
        $instructor->specialization_id = $request->input('specialization_id');
        $instructor->facebook = $request->input('facebook');
        $instructor->twitter = $request->input('twitter');
        $instructor->github = $request->input('github');
        $instructor->specialization = $request->input('specialization');

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('images/instructors', $file_name);
            $instructor->photo = $file_name;
        }

        $instructor->save();

        // $file_extension = $request->file('photo')->getClientOriginalExtension();
        // $file_name = time().'.'.$file_extension;
        // $path = 'images/instructors';
        // $request->photo->move(public_path($path), $file_name);

        // Instructor::create([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'email' => $request->email,
        //     'specialization' => $request->specialization,
        //     'photo' =>  'fsfs'
        // ]);

        return redirect()->back()->with(['success' => 'تمت الإضافة بنجاح']);
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
        $instructor = Instructor::find($id);
        $academy = Auth()->user();
        $specializations = $academy->specializations;
        return view('academy.dashboard.instructor.edit', [
            'instructor' => $instructor,
            'specializations' => $specializations
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
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email' => 'required|unique:email|email',
            'about' => 'required|date,|after_or_equal:now',
            'specialization_id' => 'required|date|after_or_equal:start_at',
            'specialization' => 'required',
            
        ]);
        $instructor = Instructor::find($id);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('images/instructors', $file_name);
            $instructor->photo = $file_name;
        }
        $instructor->update($request->except('photo'));

        return redirect()->route('instructors.index')->with(['success', 'تم التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Instructor::findOrFail($id)->delete();
       return redirect()->back()->with(['success' => 'تمت عملية الحذف بنجاح']);
    }
}
