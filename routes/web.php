<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


//注册
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// 登录
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// 管理员
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/students', [AdminController::class, 'manageStudents'])->name('admin.students');
Route::post('/admin/students', [AdminController::class, 'store'])->name('admin.students.store');
Route::delete('/admin/students/{student}', [AdminController::class, 'destroy'])->name('admin.students.destroy');

//学生
Route::get('/student/profile', [StudentController::class, 'index'])->name('student.profile');
Route::post('/student/update', [StudentController::class, 'update'])->name('student.update');

//日志
Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
