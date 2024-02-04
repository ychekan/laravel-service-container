<?php
declare(strict_types=1);

namespace App\Contracts;

/**
 * Interface NotificationSender
 * @package App\Contracts
 */
interface NotificationSender
{
    /**
     * @param string $message
     * @return string
     */
    public function sendNotification(string $message): string;
}



