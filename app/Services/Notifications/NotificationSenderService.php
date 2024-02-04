<?php
declare(strict_types=1);

namespace App\Services\Notifications;

use App\Contracts\NotificationSender;

/**
 * Class NotificationSenderService
 * @package App\Services\Notifications
 */
class NotificationSenderService
{
    /**
     * @param NotificationSender $notificationSender
     */
    public function __construct(private readonly NotificationSender $notificationSender)
    {
    }

    /**
     * @param string $message
     * @return string
     */
    public function sendNotification(string $message): string
    {
        return $this->notificationSender->sendNotification(message: $message);
    }
}




