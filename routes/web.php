<?php

use App\Http\Controllers\Academy\PathController;
use App\Http\Controllers\Academy\StudentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\Student\AcademyController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\PathController as StudentPathController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\TestController;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use Imagick as Im;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [homeController::class, 'index'])->name('home');

route::get('/academies/{id}/{name}', [homeController::class, 'showAcademy'])->name('academy.show');
route::get('{academy}/{specialization}/paths', [homeController::class, 'showPaths'])->name('home.paths.show');
route::post('student/register', [StudentController::class, 'register'])->name('student.register');
route::post('/student/path/register', [PathController::class, 'register'])->name('path.register');
route::get('/academies', [homeController::class, 'showAcademies'])->name('academies.show');
route::get('/teachers', [homeController::class, 'allTeachers'])->name('teachers.all');
route::get('/teachers/{id}', [homeController::class, 'showTeacher'])->name('teacher.show');
route::get('/paths', [homeController::class, 'allPaths'])->name('paths.all');
route::get('/paths/{id}', [homeController::class, 'showPath'])->name('home.path.show');

Route::group(['namespace' => '',
            'prefix' => 'student',
            'middleware' => 'auth:web'], function() {
///////////////////////////////// Academy Routes //////////////////////////////////////////////
    route::get('academies', [AcademyController::class, 'index'])->name('academies.index');
    route::delete('academy/{id}', [AcademyController::class, 'destroy'])->name('academy.delete');

///////////////////////////////// Paths Routes //////////////////////////////////////////////
    route::get('paths', [StudentPathController::class, 'index'])->name('student.paths.index');
    route::get('path/{id}', [StudentPathController::class, 'show'])->name('student.path.show');
    route::delete('path/{id}', [StudentPathController::class, 'destroy'])->name('path.delete');

///////////////////////////////// Courses Routes //////////////////////////////////////////////
    route::get('course/show/{id}', [CourseController::class, 'show'])->name('student.course.show');

///////////////////////////////// Lessons Routes //////////////////////////////////////////////
    route::get('lesson/{id}', [CourseController::class, 'showLesson'])->name('student.lesson.show');
    route::get('attachements/download//{name}', [CourseController::class, 'download'])->name('student.attach.download');

///////////////////////////////// Courses Routes //////////////////////////////////////////////
    route::get('test/{id}', [TestController::class, 'show'])->name('student.test.show');
    route::post('tets/store', [TestController::class, 'store'])->name('student.test.store');

///////////////////////////////// Profile Routes //////////////////////////////////////////////
    route::get('/profile/edit', [ProfileController::class, 'edit'])->name('student.profile.edit');
    route::post('/profile', [ProfileController::class, 'update'])->name('student.profile.update');

///////////////////////////////// Comment Routes //////////////////////////////////////////////
    route::post('comments', [CommentController::class, 'store'])->name('comment.store');


});



Route::get('/dashboard', function () {
    return view('student.dashboard.index');
})->middleware(['auth:web'])->name('dashboard');


require __DIR__.'/auth.php';
require __DIR__.'/adminauth.php';
require __DIR__.'/academyauth.php';
require __DIR__.'/admin.php';
require __DIR__.'/academy.php';




