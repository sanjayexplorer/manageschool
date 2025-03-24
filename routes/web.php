<?php

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

// Guest routes
Route::post('/image/upload', [App\Http\Controllers\Web\Public\PublicController::class, 'imageUpload'])->name('image.upload.post');
Route::group(['middleware' => 'guest'], function () {

    // Fallback for guests 
    Route::fallback(function () {
        return redirect('/');
    });

    Route::get('/', [App\Http\Controllers\Web\Public\PublicController::class, 'index'])->name('welcome');
    Route::post('/inquiry/post', [App\Http\Controllers\Web\Public\PublicController::class, 'inquiryPost'])->name('inquiry.post');
    
    Route::get('/login', [App\Http\Controllers\Web\Auth\AuthController::class, 'Login'])->name('login');
    Route::post('/loginPost', [App\Http\Controllers\Web\Auth\AuthController::class, 'loginPost'])->name('login.post');


});


// Admin routes
Route::group(
    [
        'prefix'=>'admin','as'=>'admin.',
            'middleware' => [
                'auth','role:admin'
            ],
    ],
 
    function () {
        Route::get('/dashboard', [App\Http\Controllers\Web\Admin\DashboardController::class, 'Dashboard'])->name('dashboard');
});


// Principal routes
Route::group(
    [
        'prefix'=>'principal','as'=>'principal.',
            'middleware' => [
                'auth','role:principal'
            ],
    ],
    function () {
        Route::get('/dashboard', [App\Http\Controllers\Web\Principal\DashboardController::class, 'Dashboard'])->name('dashboard');
});


// Teacher routes
Route::group(
    [
        'prefix'=>'teacher','as'=>'teacher.',
            'middleware' => [
                'auth','role:teacher'
            ],
    ],
    function () {
        Route::get('/dashboard', [App\Http\Controllers\Web\Teacher\DashboardController::class, 'Dashboard'])->name('dashboard');
});


