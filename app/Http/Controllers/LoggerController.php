<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Logger;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class LoggerController
 * @package App\Http\Controllers
 */
class LoggerController extends Controller
{
    /**
     * @param Request $request
     * @param Logger $logger
     * @return JsonResponse
     */
    public function store(Request $request, Logger $logger): JsonResponse
    {
        $message = $request->get(key: 'message');

        $logger->logMessage(message: $message);

        return response()->json([
            'data' => $logger->getLogs()
        ]);
    }
}




