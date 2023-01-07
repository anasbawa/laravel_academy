<?php

namespace App\Http\Controllers\Academy;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use Illuminate\Http\Request;

class profileController extends Controller
{

    public function edit()
    {
        // $academy = auth('academy')->user();

        return view('academy.profile.edit');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:191',
            'email' => 'required|unique:email|email',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $id = auth('academy')->user()->id;
        $academy = Academy::find($id);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('images/academies', $file_name);
            $academy->photo = $file_name;
        }

        $academy->name = $request->name;
        $academy->email = $request->email;
        $academy->update();

        return back()->with(['success', 'تم تعديل البيانات بنجاح']);


        // $instructor->update($request->all());
    }

    public function report()
    {
        $academy = auth('academy')->user();
        return view('academy.dashboard.report', compact('academy'));
    }
}
