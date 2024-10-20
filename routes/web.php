<?php

use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\User\CourseController;
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


Route::get('/', [CourseController::class, 'showAll'])->name('index');

Route::get('/teachers', function () {
    return view('teachers');
})->middleware(['auth', 'verified'])->name('teachers');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [CourseController::class, 'index'])->name('dashboard');
    Route::put('/dashboard/{course}', [CourseController::class, 'update'])->name('dashboard.update');

    Route::delete('/dashboard/{course}', [CourseController::class, 'destroy'])->name('dashboard.destroy');
    Route::get('/dashboard/{course}', [CourseController::class, 'edit'])->name('dashboard.edit');
    Route::post('/course/create', [CourseController::class, 'store'])->name('course.create');

    Route::post('/dashboard/{course}/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
    Route::delete('/schedules/{schedule}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');

    Route::get('/general', [ProfileController::class, 'edit'])->name('general');

    Route::get('/phones', [PhoneController::class, 'index'])->name('phones');
    Route::get('/phones/{phone}', [PhoneController::class, 'edit'])->name('phones.edit');
    Route::put('/phones/{phone}', [PhoneController::class, 'update'])->name('phones.update');
    Route::delete('/phones/{phone}', [PhoneController::class, 'destroy'])->name('phones.destroy');
    Route::post('/phones/create', [PhoneController::class, 'store'])->name('phones.create');

});


require __DIR__.'/auth.php';
