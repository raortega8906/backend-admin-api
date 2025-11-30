<?php

use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('is_admin')->group(function(){

    // Profile management
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Work Experiences
    Route::get('admin/experiences', [ExperienceController::class, 'index'])->name('admin.experiences.index');
    Route::get('admin/experiences/create', [ExperienceController::class, 'create'])->name('admin.experiences.create');
    Route::post('admin/experiences', [ExperienceController::class, 'store'])->name('admin.experiences.store');
    Route::get('admin/experiences/{experience}/edit', [ExperienceController::class, 'edit'])->name('admin.experiences.edit');
    Route::put('admin/experiences/{experience}', [ExperienceController::class, 'update'])->name('admin.experiences.update');
    Route::delete('admin/experiences/{experience}', [ExperienceController::class, 'destroy'])->name('admin.experiences.destroy');

    // Projects
    Route::get('admin/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('admin/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('admin/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('admin/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

});

require __DIR__.'/auth.php';
