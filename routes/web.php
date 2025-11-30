<?php

use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Documentation
Route::get('/api/documentation', function () {
    return view('api.documentation');
})->name('api.documentation');

Route::middleware('is_admin')->group(function(){

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::prefix('admin')->middleware('auth')->group(function () {

        // Profile management
        Route::middleware('auth')->group(function () {
            Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        // Work Experiences
        Route::get('experiences', [ExperienceController::class, 'index'])->name('admin.experiences.index');
        Route::get('experiences/create', [ExperienceController::class, 'create'])->name('admin.experiences.create');
        Route::post('experiences', [ExperienceController::class, 'store'])->name('admin.experiences.store');
        Route::get('experiences/{experience}/edit', [ExperienceController::class, 'edit'])->name('admin.experiences.edit');
        Route::put('experiences/{experience}', [ExperienceController::class, 'update'])->name('admin.experiences.update');
        Route::delete('experiences/{experience}', [ExperienceController::class, 'destroy'])->name('admin.experiences.destroy');

        // Projects
        Route::get('projects', [ProjectController::class, 'index'])->name('admin.projects.index');
        Route::get('projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
        Route::post('projects', [ProjectController::class, 'store'])->name('admin.projects.store');
        Route::get('projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
        Route::put('projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
        Route::delete('projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

    });

});

require __DIR__.'/auth.php';
