<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 

use App\Http\Controllers\Api\AcadeyController;
use App\Http\Controllers\Api\AuthTokenController;
use App\Http\Controllers\Api\AcademyUserController;
use App\Http\Controllers\Api\PathOfAcademy;
use App\Models\Academy;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('Academy', AcadeyController::class );

//user_profile

Route::post('register',[AuthTokenController::class,'index']);

Route::post('auth/tokens',[AuthTokenController::class,'store'])
    ->middleware(['guest:sanctum']);

Route::delete('auth/tokens/{id}',[AuthTokenController::class,'destroy'])
    ->middleware(['auth:sanctum']);

Route::post('update',[AuthTokenController::class,'update'])
    ->middleware(['auth:sanctum']);

    //Academy  

Route::get('getacademy',[AcademyUserController::class,'index']);

Route::post('addacademytouser/{id}',[AcademyUserController::class,'store']);

Route::get('showAcademyWithUser',[AcademyUserController::class,'show']);

Route::get('getPath/{id}',[PathOfAcademy::class,'index']);

Route::get('getCourse/{id}',[PathOfAcademy::class,'store']);

Route::get('getSection/{id}',[PathOfAcademy::class,'show']);

Route::get('getLesson/{id}',[PathOfAcademy::class,'update']);


  // Random

Route::get('randomCours',[PathOfAcademy::class,'randomCours']);

Route::get('randomAcademy',[PathOfAcademy::class,'randomAcademy']);

Route::get('randomInstructor',[PathOfAcademy::class,'randomInstructor']);

Route::get('randomPath',[PathOfAcademy::class,'randomPath']);

Route::get('getInstructorforacademy/{id}',[AcademyUserController::class,'getInstructorforacademy']);

Route::get('getPathofUser',[AcademyUserController::class,'getPathofUser']);

Route::post('lissonUser',[AuthTokenController::class,'lissonUser']);


