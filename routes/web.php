<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ReportController;

Route::get('/', [AuthController::class, 'index'])->name('index');
Route::get('/sign-up', [AuthController::class, 'signup'])->name('signup');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/home', [AuthController::class, 'dashboard'])->name('dashboard');

// Courses
Route::prefix('courses')->name('courses.')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/create', [CourseController::class, 'create'])->name('create');
    Route::get('/{id}/edit', [CourseController::class, 'edit'])->name('edit');
    Route::post('/', [CourseController::class, 'store'])->name('store');
    Route::put('/{id}', [CourseController::class, 'update'])->name('update');
    Route::delete('/{id}', [CourseController::class, 'destroy'])->name('destroy');

    Route::post('/{id}/enroll', [CourseController::class, 'enroll'])->name('enroll');
});


// Materials
Route::prefix('materials')->name('materials.')->group(function () {
    Route::get('/', [MaterialController::class, 'index'])->name('index');
    Route::get('/create-material', [MaterialController::class, 'create'])->name('create');
    Route::post('/', [MaterialController::class, 'store'])->name('store');
    Route::get('/{id}/download', [MaterialController::class, 'download'])->name('download');
});

// Assignments
Route::prefix('assignments')->name('assignments.')->group(function () {
    Route::get('/', [AssignmentController::class, 'index'])->name('index');
    Route::post('/', [AssignmentController::class, 'store'])->name('store');
});

// Submissions
Route::prefix('submissions')->name('submissions.')->group(function () {
    Route::post('/', [SubmissionController::class, 'store'])->name('store');
    Route::post('/{id}/grade', [SubmissionController::class, 'grade'])->name('grade');
});


// Discussions
// Route::post('/discussions', [DiscussionController::class, 'store'])->middleware('auth:sanctum');
// Route::post('/discussions/{id}/replies', [DiscussionController::class, 'reply'])->middleware('auth:sanctum');

// Reports
Route::get('/reports/courses', [ReportController::class, 'courses']);
Route::get('/reports/assignments', [ReportController::class, 'assignments']);
Route::get('/reports/students/{id}', [ReportController::class, 'student']);

