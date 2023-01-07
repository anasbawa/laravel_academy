<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Academy\LessonUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthTokenController extends Controller
{

    public function index(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=> ['required','unique:users,email','email'],
            'password'=> 'required',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return response()->json([
            'message'=>'true',
        ],200);

//    return $request -> user()->tokens;

    }

    public function store(Request $request)
    {

        $attr = $request->validate([
            'email'=> 'required',
            'password'=> 'required',
//            'device_name'=> 'required',
        ]);



        if (!Auth::attempt($attr)) {
            return response()->json('Credentials not match', 401);
        }

        return response()->json([
            'token' => auth()->user()->createToken('API Token')->plainTextToken,
            'user' => auth()->user()
        ]);

    }
    public function destroy($id)
    {
        $user = Auth::guard('sanctum')->user();

        //        logout frome single devices

        $user->tokens()->findOrFail($id)->delete();

        //        logout frome all devices
        //$user->tokens()->delete();

        return[
            'message' => 'token deleted'
        ];
        //        logout frome currrnt devices
//        return $user->currrntAccessToken()->delete();
    }

    public function update(Request $request)

    {

        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'country'=>'required',


        ]);

        $user_id = auth()->user()->id;

        $user = User::where('id',$user_id)->first();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->country = $request->country;
        $user->age = $request->age;
        if ($request->image == null) {
            $user->image = $user->image;
        } else {
            if ($request->hasFile('image')) {
                $image_name = time() . '.' . $request->file('image')->extension();
                $request->file('image')->move(public_path() . '/assets/images/user/', $image_name);
                $user->image = $image_name;
            }
        }
        $user->save();
        return response()->json([
            'message'=>'TRUE IN UPDATE',
        ],200);
    }

    public function lissonUser(Request $request){
        $lisson =new LessonUser;
        $lisson->user_id = $request->user_id;
        $lisson->lesson_id = $request->lesson_id;
        $lisson->course_id = $request->course_id;
        $lisson->save();
        return response()->json([
            'message'=>'تم تسجيل حضور الطالب',
        ],200);
    }


}

