<?php

use App\Http\Controllers\Api\V1\ApiExperienceController;
use App\Http\Controllers\Api\V1\ApiProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function() {

    // Experiences:
    Route::get('experiences', [ApiExperienceController::class, 'index']);
    Route::get('experiences/{experience}', [ApiExperienceController::class, 'show']);

    // Projects:
    Route::get('projects', [ApiProjectController::class, 'index']);
    Route::get('projects/project', [ApiProjectController::class, 'show']);

});
