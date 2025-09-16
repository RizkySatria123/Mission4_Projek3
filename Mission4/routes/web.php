<?php

use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Role admin course
Route::middleware(['auth.session', 'role:admin'])->group(function () {
    
    // Dashboard
    Route::get('/admin/courses/dashboard', [CourseController::class, 'dashboard'])->name('admin.courses.dashboard');

    // CRUD Courses
    Route::resource('/admin/courses', CourseController::class)->names([
        'index'   => 'admin.courses.index',
        'create'  => 'admin.courses.create',
        'store'   => 'admin.courses.store',
        'show'    => 'admin.courses.show',
        'edit'    => 'admin.courses.edit',
        'update'  => 'admin.courses.update',
        'destroy' => 'admin.courses.destroy',
    ]);
});

// Role admin user
Route::middleware(['auth.session', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', AdminUserController::class)->names([
        'index'   => 'users.index',
        'create'  => 'users.create',
        'store'   => 'users.store',
        'show'    => 'users.show',
        'edit'    => 'users.edit',
        'update'  => 'users.update',
        'destroy' => 'users.destroy',
    ]);
});

// Role student
Route::middleware(['auth.session', 'role:student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {
        Route::get('/dashboard', [EnrollController::class, 'index'])->name('dashboard');
        Route::get('/courses', [EnrollController::class, 'index'])->name('courses.index');
        Route::post('/courses/{id}/enroll', [EnrollController::class, 'enroll'])->name('courses.enroll');
        Route::get('/my-courses', [EnrollController::class, 'myCourses'])->name('courses.my');
        Route::get('/courses/{id}', [EnrollController::class, 'show'])->name('courses.show'); // <-- ini penting
    });


