<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [App\Http\Controllers\Api\Auth\AuthController::class, 'login']);
Route::post('/register', [App\Http\Controllers\Api\Auth\AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [App\Http\Controllers\Api\Auth\AuthController::class, 'logout']);

    Route::prefix('admin')->middleware('role:admin')->group(function () {
    Route::get('/users/list', [App\Http\Controllers\Api\User\UserController::class, 'list']);
    });

    Route::prefix('principal')->middleware('role:principal')->group(function () {
        
        Route::get('/dashboard', function () {
            return 'Principal dashboard';
        });
    });

    Route::prefix('teacher')->middleware('role:teacher')->group(function () {
        Route::get('/dashboard', function () {
            return 'Teacher dashboard';
        });
    });

});