<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GeneralInfoController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\User\CourseController;
use App\Http\Controllers\User\TeacherController;
use App\Http\Controllers\VideocourseController;
use App\Models\GeneralInfo;
use App\Models\Phone;
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
Route::get('/videolessons', [VideocourseController::class, 'showAll'])->name('videolessons');
Route::get('/course/{course}', [CourseController::class, 'show'])->name('dashboard.show');

Route::get('/tutors', [TeacherController::class, 'showAll'])->name('user.teachers');
Route::get('/teacher/{teacher}', [TeacherController::class, 'show'])->name('teacher.show');

Route::get('/dummy', function() {
    $phones = Phone::all();
    $info = GeneralInfo::first();
    return view('dummy', compact('phones', 'info'));
})->name('dummy');

Route::get('/softskills', function () {
    return redirect('https://softskills-course.ru');
})->name('softskills');

Route::get('/basiccourse', function () {
    return redirect('https://online.mpl12.institute');
})->name('basiccourse');

Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send.email');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Courses
    Route::get('/admin', [CourseController::class, 'index'])->name('dashboard');
    Route::put('/admin/{course}', [CourseController::class, 'update'])->name('dashboard.update');

    Route::delete('/admin/{course}', [CourseController::class, 'destroy'])->name('dashboard.destroy');
    Route::get('/admin/{course}', [CourseController::class, 'edit'])->name('dashboard.edit');
    Route::post('/course/create', [CourseController::class, 'store'])->name('course.create');

    // Videocourses
    Route::get('/videocourses', [VideocourseController::class, 'index'])->name('videocourses');
    Route::put('/videocourses/{videocourse}', [VideocourseController::class, 'update'])->name('videocourse.update');

    Route::delete('/videocourses/{videocourse}', [VideocourseController::class, 'destroy'])->name('videocourse.destroy');
    Route::get('/videocourses/{videocourse}', [VideocourseController::class, 'edit'])->name('videocourse.edit');
    Route::post('/videocourses/create', [VideocourseController::class, 'store'])->name('videocourse.create');

    // Schedules
    Route::post('/admin/{course}/schedules', [ScheduleController::class, 'store'])->name('schedules.store');
    Route::delete('/schedules/{schedule}', [ScheduleController::class, 'destroy'])->name('schedules.destroy');

    Route::get('/phones', [PhoneController::class, 'index'])->name('phones');
    Route::get('/phones/{phone}', [PhoneController::class, 'edit'])->name('phones.edit');
    Route::put('/phones/{phone}', [PhoneController::class, 'update'])->name('phones.update');
    Route::delete('/phones/{phone}', [PhoneController::class, 'destroy'])->name('phones.destroy');
    Route::post('/phones/create', [PhoneController::class, 'store'])->name('phones.create');


    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');
    Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
    Route::get('/teachers/{teacher}', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::post('/teachers/create', [TeacherController::class, 'store'])->name('teachers.create');

    Route::post('/teachers/{teacher}/article', [ArticleController::class, 'store'])->name('article.store');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');

    Route::get('/general', [GeneralInfoController::class, 'edit'])->name('general');
    Route::put('/general-info/update', [GeneralInfoController::class, 'update'])->name('general.update');

});


require __DIR__.'/auth.php';
