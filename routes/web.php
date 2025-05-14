<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Guest routes
Route::post('/image/upload', [App\Http\Controllers\Web\Public\PublicController::class, 'imageUpload'])->name('image.upload.post');
Route::group(['middleware' => 'guest'], function () {

    Route::fallback(function () {
        return redirect('/');
    });

    Route::get('/', [App\Http\Controllers\Web\Public\PublicController::class, 'index'])->name('welcome');
    Route::post('/inquiry/post', [App\Http\Controllers\Web\Public\PublicController::class, 'inquiryPost'])->name('inquiry.post');

    Route::get('/login', [App\Http\Controllers\Web\Auth\AuthController::class, 'Login'])->name('login');
    Route::post('/loginPost', [App\Http\Controllers\Web\Auth\AuthController::class, 'loginPost'])->name('login.post');
    Route::get('/inquiry/email', [App\Http\Controllers\Web\Public\PublicController::class, 'inquiryEmail'])->name('inquiry.email');



    Route::get('/google/redirect', [App\Http\Controllers\Web\Auth\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
    Route::get('/google/callback', [App\Http\Controllers\Web\Auth\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');


});

Route::post('/logout', [App\Http\Controllers\Web\Auth\AuthController::class, 'logout'])->name('logout');


// Admin routes
Route::group(
    [
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => [
            'auth',
            'role:admin'
        ],
    ],

    function () {
        Route::get('/dashboard', [App\Http\Controllers\Web\Admin\DashboardController::class, 'index'])->name('dashboard');
        // Student Routes
        Route::get('/students', [App\Http\Controllers\Web\Admin\StudentController::class, 'index'])->name('students.index');
        Route::get('/students/create', [App\Http\Controllers\Web\Admin\StudentController::class, 'create'])->name('students.create');
        Route::post('/students', [App\Http\Controllers\Web\Admin\StudentController::class, 'store'])->name('students.store');
        Route::get('/students/{id}/show', [App\Http\Controllers\Web\Admin\StudentController::class, 'show'])->name('students.show');
        Route::get('/students/{id}/edit', [App\Http\Controllers\Web\Admin\StudentController::class, 'edit'])->name('students.edit');
        Route::post('/students/{id}/update', [App\Http\Controllers\Web\Admin\StudentController::class, 'update'])->name('students.update');
        Route::post('/students/{id}/delete', [App\Http\Controllers\Web\Admin\StudentController::class, 'destroy'])->name('students.destroy');
        Route::get('/students/data', [App\Http\Controllers\Web\Admin\StudentController::class, 'getStudentsData'])->name('students.data');

        // Attendance Routes
        Route::get('/attendance', [App\Http\Controllers\Web\Admin\AttendanceController::class, 'index'])->name('attendance.index');
        Route::get('/class/{classId}/students', [App\Http\Controllers\Web\Admin\AttendanceController::class, 'classStudents'])->name('class.students');
        Route::post('/class/attendance/store', [App\Http\Controllers\Web\Admin\AttendanceController::class, 'storeAttendance'])->name('class.attendance.store');

        // Teachers Routes
        Route::get('/teachers', [App\Http\Controllers\Web\Admin\TeacherController::class, 'index'])->name('teachers.index');
        Route::get('/teachers/create', [App\Http\Controllers\Web\Admin\TeacherController::class, 'create'])->name('teachers.create');
        Route::post('/teachers', [App\Http\Controllers\Web\Admin\TeacherController::class, 'store'])->name('teachers.store');
        Route::get('/teachers/{id}/show', [App\Http\Controllers\Web\Admin\TeacherController::class, 'show'])->name('teachers.show');
        Route::get('/teachers/{id}/edit', [App\Http\Controllers\Web\Admin\TeacherController::class, 'edit'])->name('teachers.edit');
        Route::post('/teachers/{id}/update', [App\Http\Controllers\Web\Admin\TeacherController::class, 'update'])->name('teachers.update');
        Route::post('/teachers/{id}/delete', [App\Http\Controllers\Web\Admin\TeacherController::class, 'destroy'])->name('teachers.destroy');
        Route::get('/teachers/data', [App\Http\Controllers\Web\Admin\TeacherController::class, 'getTeachersData'])->name('teachers.data');


        Route::get('/classes', [App\Http\Controllers\Web\Admin\ClassController::class, 'index'])->name('classes.index');
        Route::post('/assign-class', [App\Http\Controllers\Web\Admin\ClassController::class, 'assign'])->name('classes.assign');




    }
);


// Principal routes
Route::group(
    [
        'prefix' => 'principal',
        'as' => 'principal.',
        'middleware' => [
            'auth',
            'role:principal'
        ],
    ],
    function () {
        Route::get('/dashboard', [App\Http\Controllers\Web\Principal\DashboardController::class, 'index'])->name('dashboard');
    }
);


// Teacher routes
Route::group(
    [
        'prefix' => 'teacher',
        'as' => 'teacher.',
        'middleware' => [
            'auth',
            'role:teacher'
        ],
    ],
    function () {
        Route::get('/dashboard', [App\Http\Controllers\Web\Teacher\DashboardController::class, 'index'])->name('dashboard');
    }
);
