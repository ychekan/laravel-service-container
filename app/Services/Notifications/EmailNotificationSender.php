<?php
declare(strict_types=1);

namespace App\Services\Notifications;

use App\Contracts\NotificationSender;

/**
 * Class EmailNotificationSender
 * @package App\Services\Notifications
 */
class EmailNotificationSender implements NotificationSender
{
    /**
     * @param string $message
     * @return string
     */
    public function sendNotification(string $message): string
    {
        return "Sending email notification: $message";
    }
}



