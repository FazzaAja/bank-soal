<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LecturerController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('lecturer', LecturerController::class);
    Route::resource('subject', SubjectController::class);
          
    Route::get('/exam/{exam}/edit', [ExamController::class, 'edit'])->name('exam.edit');  
    Route::put('/exam/{exam}', [ExamController::class, 'update'])->name('exam.update');  
    Route::delete('/exam/{exam}', [ExamController::class, 'destroy'])->name('exam.destroy');
});


Route::get('/exam', [ExamController::class, 'index'])->name('exam.index');        
Route::get('/exam/create', [ExamController::class, 'create'])->name('exam.create');   
Route::post('/exam', [ExamController::class, 'store'])->name('exam.store');        
Route::get('/exam/{exam}', [ExamController::class, 'show'])->name('exam.show');