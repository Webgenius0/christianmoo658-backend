<?php

use App\Http\Controllers\Api\V1\User\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user/')->middleware(['auth:api', 'verified.api'])
->controller(UserController::class)->group(function () {
    Route::post('/course-subscribe', 'subscribe');
});
