<?php
declare(strict_types=1);

namespace App\Contracts;

/**
 * Interface PaymentGateway
 * @package App\Contracts
 */
interface PaymentGateway
{
    /**
     * @param int $amount
     * @return array
     */
    public function processPayment(int $amount): array;
}


