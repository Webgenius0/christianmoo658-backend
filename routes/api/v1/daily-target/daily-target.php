<?php

use App\Http\Controllers\Api\V1\DailyTarget\DailyTargetController;
use Illuminate\Support\Facades\Route;

Route::prefix('daily-target')->middleware(['auth:api', 'verified.api'])->controller(DailyTargetController::class)->group(function () {
    Route::get('/', 'index');
});
