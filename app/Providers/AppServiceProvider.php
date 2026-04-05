<?php

namespace App\Providers;

use App\Contracts\PaymentGatewayInterface;
use App\Domains\User\Contracts\SmsProviderInterface;
use App\Domains\User\Contracts\UserServiceInterface;
use App\Domains\User\Services\UserService;
use App\Services\PaymobPaymentGateway;
use App\Services\TwilioSmsService;
use CompanySettings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
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
        $this->app->bind(PaymentGatewayInterface::class, PaymobPaymentGateway::class);
        $this->app->singleton(CompanySettings::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (! app()->isProduction()) {
            Model::preventLazyLoading();
        }

        Event::listen(OrderCreated::class, DeductInventoryStock::class);
    }
}
