<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Academy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AcademyController extends Controller
{
    public function index()
    {
        $Academy = Academy::all();
        return view('admin.dashboard.academies.index', [
            'Academy' => $Academy
        ]);
    }
    
    public function store(Request $request)
    {
        $academy = new Academy();
        $academy->name = $request->input('name');
        $academy->email = $request->input('email');
        $academy->password = Hash::make($request->password);
        $academy->save();
        return redirect()->back()->with(['success' => 'تمت الإضافة بنجاح']);
    }

    public function destroy($id)
    {
        Academy::findOrFail($id)->delete();
        return redirect()->back()->with(['success' => 'تمت الحذف بنجاح']);
    }
}
