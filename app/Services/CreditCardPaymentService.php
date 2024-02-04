<?php
declare(strict_types=1);

namespace App\Services;

use App\Contracts\PaymentGateway;

/**
 * Class CreditCardPaymentGateway
 * @package App\Services
 */
class CreditCardPaymentService implements PaymentGateway
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
        // TODO billing process this
        return [
            'amount' => $amount,
            'payment_method' => 'credit_cart',
            'currency' => $this->currency
        ];
    }
}


