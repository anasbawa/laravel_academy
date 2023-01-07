<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        // $academy = auth('academy')->user();

        return view('student.dashboard.profile.edit');
    }

    public function update(Request $request)
    {
        $id = auth('web')->user()->id;
        $user = User::find($id);
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('images/students', $file_name);
            $user->photo = $file_name;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->update();

        return back()->with(['success', 'تم تعديل البيانات بنجاح']);


        // $instructor->update($request->all());
    }
}
