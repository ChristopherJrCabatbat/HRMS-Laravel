<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RecruitmentController;

use Illuminate\Support\Facades\Route;

// // Test
// Route::get('/', function () {
//     return view('z-skeleton');
// });

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('start.home-page');
});

Route::get('/recruitment', function () {
    return view('start.recruitment');
});
Route::post('/storeRecruitment', [ManagerController::class, 'storeRecruitment'])->name('storeRecruitment');


Route::get('/admin', function () {
    return view('start.admin');
});
Route::get('/admin-register', function () {
    return view('start.admin-register');
});

// Route::get('/content-dashboard', function () {
//     return view('content-pages.dashboard');
// });


// Manager Routes
Route::group([
    'prefix' => 'manager', 'as' => 'manager.',
    'middleware' => ['auth', 'verified'],
], function () {

    // Dashboard
    Route::get('/content_dashboard', [ManagerController::class, 'content_dashboard'])->name('content_dashboard');

    // Employee
    Route::resource('employee', EmployeeController::class);

    // Attendace
    Route::resource('attendance', AttendanceController::class);

    // Leave
    Route::resource('leave', LeaveController::class);

    // Department
    Route::resource('department', DepartmentController::class);

    // Recruitment
    // Route::get('/recruitment-dashboard', [ManagerController::class, 'recruitmentDashboard'])->name('recruitmentDashboard');
    Route::resource('recruitment-dashboard', RecruitmentController::class);

    // Payroll
    Route::get('/payroll', [ManagerController::class, 'payroll'])->name('payroll');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::get('admin/dashboard', [LoginController::class, 'index'])->middleware(['auth', 'login']);
