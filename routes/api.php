<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum')
    ->name('logout');

Route::middleware('auth:sanctum')->post('/courses', [CourseController::class, 'store']);