<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//auth route
Route::get('/',[AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);

//admin route
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/admin/admin/list', function() {
    return view('admin.admin.list');
});

//student route
Route::resource('/admin/students', StudentController::class);
Route::post('/admin/students', [StudentController::class, 'store'])->name('admin.students.store');
Route::get('/admin/students', [StudentController::class, 'index'])->name('admin.students.index');
Route::get('/admin/students/{$id}', [StudentController::class, 'show'])->name('admin.students.show');
Route::get('/admin/students/{$id}/edit', [StudentController::class, 'edit'])->name('admin.students.edit');
Route::post('/admin/students/{$id}', [StudentController::class, 'update'])->name('admin.students.update');


//classroom route
Route::resource('/admin/classroom', ClassroomController::class);
Route::post('/admin/classroom', [ClassroomController::class, 'store'])->name('admin.classroom.store');
Route::get('/admin/classroom', [ClassroomController::class, 'index'])->name('admin.classroom.index');

//for pagination testing
// Route::get('users', [UserController::class, 'index']);
