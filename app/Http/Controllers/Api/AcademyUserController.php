<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Academy;
use App\Models\Academy\AcademyUser;
use App\Models\Academy\Instructor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use NunoMaduro\Collision\Adapters\Laravel\Inspector;

class AcademyUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //get Academy and specializations

    public function index()
    {
       $academy = Academy::with('specializations')->get();
       return response()->json([
        'academy'=>$academy
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   //add Academy To User

    public function store(Request $request , $academyId)
    {

        $userId = Auth::guard('sanctum')->user()->id;
        $academyUser = new AcademyUser;
        $academyUser->academy_id = $academyId;
        $academyUser->user_id = $userId;
        $academyUser->status = 1;

        $academyUser->save();
        return response()->json([
            'message'=>'true',
        ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //show Academy With User

    public function show()
    {
        $userId = Auth::guard('sanctum')->user()->id;
        $user = User::where('id',$userId)->with('academies')->get();
       return response()->json([
        'user'=>$user
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


    public function getInstructorforacademy($academyId)
    {
        $instructor = Instructor::where('academy_id',$academyId)->get();
       return response()->json([
        'instructor'=>$instructor
    ]);
    }

    public function getPathofUser()
    {
        $userId = Auth::guard('sanctum')->user()->id;
        $path =User::where('id',$userId)->with('paths')->get();
        return response()->json([
            'path'=>$path
        ]);
    }
}
