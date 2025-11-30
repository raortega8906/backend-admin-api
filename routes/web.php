<?php

use App\Http\Controllers\Admin\ExperienceController;
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

});

require __DIR__.'/auth.php';
