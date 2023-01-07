<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use App\Models\Academy\Specialization;
use App\Models\Academy\Path;
use App\Models\Academy\PathUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PathController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academy = Academy::findOrFail(Auth::guard('academy')->user()->id);
        // $paths = $academy->with('paths.courses');
        // dd($paths);
        $paths = $academy->paths;
        // $paths = Academy::with('specializations.paths')->get();
        // $paths = $academy->with(['specializations' => function($query){
        //     $query->with('paths');
        // }])->get();
        // dd($paths);

        return view('academy.dashboard.paths.index', compact('paths'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academy = Auth::user()->id;
        $specializations = Academy::find($academy)->specializations;
        return view('academy.dashboard.paths.create', compact('specializations'));
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
            'name' => 'required|max:191',
            'specialization_id' => 'required',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg',

        ]);
        $path = new Path;

        $path->name = $request->name;
        $path->specialization_id = $request->specialization_id;
        $path->academy_id = Auth::user()->id;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('images/paths', $file_name);
            $path->photo = $file_name;
        }
        $path->save();

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
        $path = Path::findOrFail($id);
        return view('academy.dashboard.paths.show', [
            'path' => $path
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $path = Path::find($id);
        $academy = Auth::user()->id;
        $specializations = Academy::find($academy)->specializations;
        return view('academy.dashboard.paths.edit', [
            'path' => $path,
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
            'name' => 'required|max:191',
            'specialization_id' => 'required',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $path = Path::find($id);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('images/paths', $file_name);
            $path->photo = $file_name;
        }
        $path->update($request->except('photo'));

        return redirect()->route('paths.index')->with(['success', 'تم التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Path::findOrFail($id)->delete;

        return redirect()->back()->with(['success', 'تم الحذف بنجاح']);
    }

    public function register(Request $request)
    {
        // dd($request);
        $register = new PathUser();

        $register->path_id = $request->path_id;
        $register->user_id = $request->student_id;
        $register->status = 0;

        $register->save();

        return back()->with(['success', 'تم إرسال الطلب بجاح']);
    }
}
