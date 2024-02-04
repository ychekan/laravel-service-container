<?php

namespace App\Providers;

use App\Contracts\NotificationSender;
use App\Contracts\PaymentGateway;
use App\Repositories\UserRepository;
use App\Services\CreditCardPaymentService;
use App\Services\Logger;
use App\Services\Notifications\EmailNotificationSender;
use App\Services\Notifications\NotificationSenderService;
use App\Services\Notifications\SmsNotificationSender;
use App\Services\PaypalPaymentService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(abstract: PaymentGateway::class, concrete:  function () {
            $currency = request()->request->get('currency') ?? 'usd';
            $paymentMethod = request()->request->get('payment_method');
            if ($paymentMethod === 'paypal') {
                return new PaypalPaymentService($currency);
            }
            return new CreditCardPaymentService($currency);
        });

        $this->app->bind(UserService::class, function ($app) {
            return new UserService($app->make(UserRepository::class));
        });

        $this->app->singleton(Logger::class, function () {
            return new Logger();
        });

        // Contextual binding based on a condition
        $this->app->when(NotificationSenderService::class)
            ->needs(NotificationSender::class)
            ->give(function ($app) {
                // Determine the context or condition here
                if (config('app.env') === 'local') {
                    return $app->make(EmailNotificationSender::class);
                } else {
                    return $app->make(SmsNotificationSender::class);
                }
            });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}


