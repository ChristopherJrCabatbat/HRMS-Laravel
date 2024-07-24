<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;

use Illuminate\Support\Facades\Route;

// // Test
// Route::get('/', function () {
//     return view('z-skeleton');
// });

Route::get('/', function () {
    return view('start.home-page');
});

Route::get('/recruitment', function () {
    return view('start.recruitment');
});

Route::get('/admin', function () {
    return view('start.admin');
});
Route::get('/admin-register', function () {
    return view('start.admin-register');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('admin/dashboard', [LoginController::class, 'index'])->middleware(['auth', 'login']);
