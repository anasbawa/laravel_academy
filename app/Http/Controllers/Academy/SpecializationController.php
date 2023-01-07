<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use App\Models\Academy\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academy = Auth::user();
        // $specializations = Specialization::where('academy_id', '=', $academy->id)->paginate(5);
        $specializations = $academy->specializations; //()->paginate()
        // dd($specializations);
        return view('academy.dashboard.specializations.index',[
            'specializations' => $specializations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('academy.dashboard.specializations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd(Auth()->user()->id);
        $validated = $request->validate([
            'name' => 'required|max:191',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg',

        ]);
        $specialization = new Specialization;

        $specialization->name = $request->name;
        $specialization->academy_id = Auth()->user()->id;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('images/specializations', $file_name);
            $specialization->photo = $file_name;
        }

        $specialization->save();

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
        $specialization = Specialization::find($id);

        return view('academy.dashboard.specializations.edit', compact('specialization'));
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
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg',

        ]);
        $specialization = Specialization::find($id);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('images/specializations', $file_name);
            $specialization->photo = $file_name;
        }
        $specialization->update($request->except('photo'));

        return redirect()->route('specializations.index')->with(['success', 'تم التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Specialization::findOrFail($id)->delete();
        return redirect()->back()->with(['success' => 'تمت الحذف بنجاح']);
    }
}
