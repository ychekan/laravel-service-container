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
            $currency = request()->request->get(key: 'currency') ?? 'usd';
            $paymentMethod = request()->request->get(key: 'payment_method');
            if ($paymentMethod === 'paypal') {
                return new PaypalPaymentService(currency: $currency);
            }
            return new CreditCardPaymentService(currency: $currency);
        });

        $this->app->bind(abstract: UserService::class, concrete: function ($app) {
            return new UserService(userRepository: $app->make(UserRepository::class));
        });

        $this->app->singleton(abstract: Logger::class, concrete: function () {
            return new Logger();
        });

        // Contextual binding based on a condition
        $this->app->when(concrete: NotificationSenderService::class)
            ->needs(abstract: NotificationSender::class)
            ->give(implementation: function ($app) {
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


