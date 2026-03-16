<?php

namespace App\Providers;

use App\Domains\User\Contracts\SmsProviderInterface;
use App\Domains\User\Contracts\UserServiceInterface;
use App\Domains\User\Services\UserService;
use App\Services\TwilioSmsService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(SmsProviderInterface::class, TwilioSmsService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (! app()->isProduction()) {
            Model::preventLazyLoading();
        }
    }
}
