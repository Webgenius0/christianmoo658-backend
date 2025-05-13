<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * V1 API Routes:
 */
Route::prefix('v1')->group(function () {
    require 'v1/auth/auth.php';                  // All Auth routes
    require 'v1/course/course.php';              // All Auth routes
    require 'v1/daily-target/daily-target.php';  // All Auth routes
    require 'v1/user/user.php';                  // All Auth routes
});
