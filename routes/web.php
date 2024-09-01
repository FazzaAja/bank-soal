<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LecturerController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\AuthController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('start');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/lecturer', [LecturerController::class, 'index'])->name('lecturer.index');
    Route::post('/lecturer', [LecturerController::class, 'store'])->name('lecturer.store');
    Route::put('/lecturer/{lecturer}', [LecturerController::class, 'update'])->name('lecturer.update');
    Route::delete('/lecturer/{lecturer}', [LecturerController::class, 'destroy'])->name('lecturer.destroy');

    Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');
    Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');
    Route::put('/subject/{subject}', [SubjectController::class, 'update'])->name('subject.update');
    Route::delete('/subject/{subject}', [SubjectController::class, 'destroy'])->name('subject.destroy');
    
    // Route::resource('subject', SubjectController::class);
          
    Route::get('/exam/{exam}/edit', [ExamController::class, 'edit'])->name('exam.edit');  
    Route::put('/exam/{exam}', [ExamController::class, 'update'])->name('exam.update');  
    Route::delete('/exam/{exam}', [ExamController::class, 'destroy'])->name('exam.destroy');

    Route::get('admin', [AuthController::class, 'admin'])->name('admin');
    Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::delete('/user/{user}', [AuthController::class, 'destroy'])->name('delete');

});


Route::get('/exam', [ExamController::class, 'index'])->name('exam.index');        
Route::get('/exam/create', [ExamController::class, 'create'])->name('exam.create');   
Route::post('/exam', [ExamController::class, 'store'])->name('exam.store');        
Route::get('/exam/{exam}', [ExamController::class, 'show'])->name('exam.show');