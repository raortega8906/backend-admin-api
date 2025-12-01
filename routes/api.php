<?php

use App\Http\Controllers\Api\V1\ApiExperienceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Experiences:
Route::prefix('v1')->group(function() {

    Route::get('experiences', [ApiExperienceController::class, 'index']);
    Route::get('experiences/{experience}', [ApiExperienceController::class, 'show']);

});
