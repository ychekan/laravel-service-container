<?php

namespace App\Http\Controllers;

use App\Services\Notifications\NotificationSenderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class NotificationSendController
 * @package App\Http\Controllers
 */
class NotificationSendController extends Controller
{
    public function sendNotification(Request $request, NotificationSenderService $notificationSender): JsonResponse
    {
        $message = $request->get(key: 'message');

        return response()->json([
            'data' => $notificationSender->sendNotification(message: $message)
        ]);
    }
}


