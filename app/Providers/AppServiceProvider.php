<?php

namespace App\Providers;

use App\Interfaces\V1\Auth\ForgetPasswordRepositoryInterface;
use App\Interfaces\V1\Auth\OTPRepositoryInterface;
use App\Interfaces\V1\Auth\PasswordRepositoryInterface;
use App\Interfaces\V1\Auth\UserRepositoryInterface;
use App\Interfaces\V1\Course\CourseRepositoryInterface;
use App\Interfaces\V1\DailyTarget\DailyTargetRepositoryInterface;
use App\Interfaces\V1\User\UserRepositoryInterface as UserUserRepositoryInterface;
use App\Repositories\V1\Auth\ForgetPasswordRepository;
use App\Repositories\V1\Auth\OTPRepository;
use App\Repositories\V1\Auth\PasswordRepository;
use App\Repositories\V1\Auth\UserRepository;
use App\Repositories\V1\Course\CourseRepository;
use App\Repositories\V1\DailyTarget\DailyTargetRepository;
use App\Repositories\V1\User\UserRepository as UserUserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // auth
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ForgetPasswordRepositoryInterface::class, ForgetPasswordRepository::class);
        $this->app->bind(OTPRepositoryInterface::class, OTPRepository::class);
        $this->app->bind(PasswordRepositoryInterface::class, PasswordRepository::class);

        // course
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);

        // daily target
        $this->app->bind(DailyTargetRepositoryInterface::class, DailyTargetRepository::class);
        // user data
        $this->app->bind(UserUserRepositoryInterface::class, UserUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
