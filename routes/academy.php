<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Academy\InstructorController;
use App\Http\Controllers\Academy\SpecializationController;
use App\Http\Controllers\Academy\CourseController;
use App\Http\Controllers\Academy\LessonController;
use App\Http\Controllers\Academy\OptionController;
use App\Http\Controllers\Academy\PathController;
use App\Http\Controllers\Academy\profileController;
use App\Http\Controllers\Academy\QuestionController;
use App\Http\Controllers\Academy\SectionController;
use App\Http\Controllers\Academy\StudentController;
use App\Http\Controllers\Academy\TestController;
use App\Http\Controllers\Academy\TopicController;

Route::get('/academy/dashboard', function () {
    return view('academy.dashboard.index');
})->middleware(['auth:academy'])->name('academy.dashboard');

Route::group(['namespace' => '',
            'prefix' => 'academy',
            'middleware' => 'auth:academy'], function() {

    route::get('/report', [profileController::class, 'report'])->name('academy.report');

    ///////////////////////////// Profile Routes //////////////// ///////////////////
    route::get('/profile/edit', [profileController::class, 'edit'])->name('profile.edit');
    route::post('/profile', [profileController::class, 'update'])->name('profile.update');


    ///////////////////////////// Instructor Routes ///////////////////////////////////
        route::get('/instructor', [InstructorController::class, 'index'])->name('instructors.index'); // done
        route::get('/instructor/create', [InstructorController::class, 'create'])->name('instructors.create'); // done
        route::get('/instructor/{id}', [InstructorController::class, 'show'])->name('instructors.show');
        route::post('/instructor', [InstructorController::class, 'store'])->name('instructors.store'); // done
        route::get('/instructor/{id}/edit', [InstructorController::class, 'edit'])->name('instructors.edit');
        route::put('/instructor/{id}', [InstructorController::class, 'update'])->name('instructors.update');
        route::delete('/instructor/{id}', [InstructorController::class, 'destroy'])->name('instructors.delete'); // done

    ///////////////////////////// Specialization Routes ///////////////////////////////////
        route::get('/specializations', [SpecializationController::class, 'index'] )->name('specializations.index');
        route::get('/specializations/create', [SpecializationController::class, 'create'])->name('specializations.create');
        route::get('specializations/{id}', [SpecializationController::class, 'show'])->name('specializations.show');
        route::post('specializations', [SpecializationController::class, 'store'])->name('specializations.store');
        route::get('/specializations/{id}/edit', [SpecializationController::class, 'edit'])->name('specializations.edit');
        route::put('/specializations/{id}', [SpecializationController::class, 'update'])->name('specializations.update');
        route::delete('/specializations/{id}', [SpecializationController::class, 'destroy'])->name('specializations.delete');

    ///////////////////////////// Paths Routes ///////////////////////////////////
        route::get('/paths', [PathController::class, 'index'] )->name('paths.index');
        route::get('/paths/create', [PathController::class, 'create'])->name('paths.create');
        route::get('paths/{id}', [PathController::class, 'show'])->name('path.show');
        route::post('paths', [PathController::class, 'store'])->name('paths.store');
        route::get('/paths/{id}/edit', [PathController::class, 'edit'])->name('paths.edit');
        route::put('/paths/{id}', [PathController::class, 'update'])->name('paths.update');
        route::delete('/paths/{id}', [PathController::class, 'destroy'])->name('paths.delete');

    ///////////////////////////// Courses Routes ///////////////////////////////////
        route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
        route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
        route::get('courses/{id}', [CourseController::class, 'show'])->name('courses.show');
        route::post('courses', [CourseController::class, 'store'])->name('courses.store');
        route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
        route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
        route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.delete');
        route::post('/courses/status/enable', [CourseController::class, 'enablePublished'])->name('courses.status.enable');
        route::post('/courses/status/disable', [CourseController::class, 'disablePublished'])->name('courses.status.disable');
        route::get('/getcourses', [CourseController::class, 'getcourses'])->name('courses.get');

    ///////////////////////////// Sections Routes ///////////////////////////////////
        route::get('sections', [SectionController::class, 'index'])->name('sections.index');
        route::get('/sections/create', [SectionController::class, 'create'])->name('sections.create');
        route::get('sections/{id}', [SectionController::class, 'show'])->name('sections.show');
        route::post('sections', [SectionController::class, 'store'])->name('sections.store');
        route::get('/sections/{id}/edit', [SectionController::class, 'edit'])->name('sections.edit');
        route::put('/sections/{id}', [SectionController::class, 'update'])->name('sections.update');
        route::delete('/sections/{id}', [SectionController::class, 'destroy'])->name('sections.delete');

    ///////////////////////////// Lessons Routes //////////////// ///////////////////
        route::get('lessons', [LessonController::class, 'index'])->name('lessons.index');
        route::get('/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
        route::get('lessons/{id}', [LessonController::class, 'show'])->name('lessons.show');
        route::post('lessons', [LessonController::class, 'store'])->name('lessons.store');
        route::get('/lessons/{id}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
        route::put('/lessons/{id}', [LessonController::class, 'update'])->name('lessons.update');
        route::delete('/lessons/{id}', [LessonController::class, 'destroy'])->name('lessons.delete');
        route::get('/getsections', [LessonController::class, 'getsections'])->name('sections.get');
        route::post('/lessons/status', [LessonController::class, 'changeStatus'])->name('lesson.status');
        route::post('/lesson/attendence', [LessonController::class, 'attendence'])->name('lesson.attendence');

    ///////////////////////////// Students Routes //////////////// ///////////////////
        route::get('/students/register', [StudentController::class, 'showStudents'])->name('students.show');
        route::delete('/students/rejected/{id}', [StudentController::class, 'rejectStudent'])->name('student.reject');
        route::post('/students/accepted/', [StudentController::class, 'acceptStudent'])->name('student.accept');

    ///////////////////////////// Test Routes //////////////// ///////////////////
        route::get('tests', [TestController::class, 'index'])->name('tests.index');
        route::get('/tests/create', [TestController::class, 'create'])->name('test.create');
        route::get('tests/{id}', [TestController::class, 'show'])->name('test.show');
        route::post('tests', [TestController::class, 'store'])->name('test.store');
        route::get('/tests/{id}/edit', [TestController::class, 'edit'])->name('test.edit');
        route::put('/tests/{id}', [TestController::class, 'update'])->name('test.update');
        route::delete('/tests/{id}', [TestController::class, 'destroy'])->name('test.delete');
        route::post('/test/active', [TestController::class, 'active'])->name('test.active');
        route::post('/test/inactive', [TestController::class, 'inActive'])->name('test.inactive');

    ///////////////////////////// Topic Routes //////////////// ///////////////////
        route::get('/topics', [TopicController::class, 'index'])->name('topics.index');
        route::get('/topic/create/{id}', [TopicController::class, 'create'])->name('topic.create');
        route::post('topic', [TopicController::class, 'store'])->name('topic.store');

    ///////////////////////////// Question Routes //////////////// ///////////////////
        route::get('/questions/{id}', [QuestionController::class, 'index'])->name('questions.index');
        route::get('/question/create/{id}', [QuestionController::class, 'create'])->name('question.create');
        route::post('question', [QuestionController::class, 'store'])->name('question.store');

     ///////////////////////////// Question Routes //////////////// ///////////////////
        route::get('/questions/{id}', [QuestionController::class, 'index'])->name('questions.index');
        route::get('/question/create/{id}', [QuestionController::class, 'create'])->name('question.create');
        route::post('question', [QuestionController::class, 'store'])->name('question.store');

    ///////////////////////////// Question Routes //////////////// ///////////////////
        route::get('/options/{id}', [QuestionController::class, 'index'])->name('options.index');
        route::get('/option/create/{id}', [OptionController::class, 'create'])->name('option.create');
        route::post('/option/store', [OptionController::class, 'store'])->name('option.store');




});


