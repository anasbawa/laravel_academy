<?php

use App\Http\Controllers\Admin\AcademyController;
use App\Http\Controllers\Admin\CategoryController;
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

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
})->middleware(['auth:admin'])->name('admin.dashboard');

Route::group(['namespace' => '',
            'prefix' => 'admin',
            'middleware' => 'auth:admin'], function() {

        route::get('/Academy', [AcademyController::class, 'index'])->name('Academy.index'); // done
        route::post('/Academy', [AcademyController::class, 'store'])->name('Academy.store'); // done
        route::delete('/Academy/{id}', [AcademyController::class, 'destroy'])->name('Academy.delete'); // done

///////////////////////// Category Routes ///////////////////////////////////
        route::get('category', [CategoryController::class, 'index'])->name('category.index');
        route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        route::post('category', [CategoryController::class, 'store'])->name('category.store');


});

Route::get('/test', function () {
    return view('admin.test');
});
