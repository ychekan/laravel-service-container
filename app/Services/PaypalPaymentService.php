<?php
declare(strict_types=1);

namespace App\Services;

use App\Contracts\PaymentGateway;

/**
 * Class PaypalPaymentService
 * @package App\Services
 */
class PaypalPaymentService implements PaymentGateway
{
    /**
     * @param string $currency
     */
    public function __construct(private readonly string $currency)
    {
    }

    /**
     * @param int $amount
     * @return array
     */
    public function processPayment(int $amount): array
    {
        // TODO Logic to process PayPal payment
        return [
            'amount' => $amount,
            'payment_method' => 'paypal',
            'currency' => $this->currency
        ];
    }
}


