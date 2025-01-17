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
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', function () {
         return view('welcome'); 
    });

    // Fallback for guests 
    Route::fallback(function () { 
        return redirect('/');
    });

    Route::get('/login', [App\Http\Controllers\Web\Auth\AuthController::class, 'Login']);
    Route::post('/loginPost', [App\Http\Controllers\Web\Auth\AuthController::class, 'loginPost']);

});


// Admin routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', function () {
        return redirect('/dashboard'); 
    });
    Route::get('/dashboard', [App\Http\Controllers\Web\Admin\DashboardController::class, 'Dashboard']);
});


// Principal routes
Route::prefix('principal')->middleware(['auth', 'role:principal'])->group(function () {
    Route::get('/', function () {
        return redirect('/dashboard'); 
    });
    Route::get('/dashboard', [App\Http\Controllers\Web\Principal\DashboardController::class, 'Dashboard']);
});


// Teacher routes
Route::prefix('teacher')->middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/', function () {
        return redirect('/dashboard'); 
    });
    Route::get('/dashboard', [App\Http\Controllers\Web\Teacher\DashboardController::class, 'Dashboard']);
});


// Fallback for authenticated users
Route::fallback(function () {
    return redirect('/'); // Adjust this to redirect authenticated users appropriately
});
