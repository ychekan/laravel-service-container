<?php
declare(strict_types=1);

namespace App\Services\Notifications;

use App\Contracts\NotificationSender;

/**
 * Class SmsNotificationSender
 * @package App\Services\Notifications
 */
class SmsNotificationSender implements NotificationSender
{
    /**
     * @param string $message
     * @return string
     */
    public function sendNotification(string $message): string
    {
        return "Sending sms notification: $message";
    }
}



