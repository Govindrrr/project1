<?php

use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectmarkController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified',])->name('dashboard');


Route::middleware('auth','admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('admin/faculty',FacultyController::class)->names('faculties');
    Route::resource('admin/subjects',SubjectController::class)->names('subjects');
    Route::resource('admin/levels',LevelController::class)->names('levels');
    Route::resource('admin/users',TeacherController::class)->names('users')->middleware('admin');
    
    Route::post('admin/import-result',[ImportExportController::class,'store'])->name('import');
    Route::get('admin/export-result',[ImportExportController::class,'export'])->name('export');
});
Route::middleware('auth')->group(function(){

    Route::resource('admin/results/view',ResultController::class)->names('results');
    Route::resource('admin/subject-marks',SubjectmarkController::class)->names('submarks');
});




require __DIR__.'/auth.php';
