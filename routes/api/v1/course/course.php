<?php

use App\Http\Controllers\Api\V1\Course\CourseController;
use Illuminate\Support\Facades\Route;

Route::prefix('course')->middleware(['auth:api', 'verified.api'])->controller(CourseController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{course}', 'show');
});
