<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\PaymentGateway;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class PaymentController
 * @package App\Http\Controllers
 */
class PaymentController extends Controller
{
    /**
     * @param Request $request
     * @param PaymentGateway $paymentGateway
     * @return JsonResponse
     */
    public function index(Request $request, PaymentGateway $paymentGateway): JsonResponse
    {
        // TODO Need validate this request
        $amount = $request->get(key: 'amount');

        return response()->json([
            'data' => $paymentGateway->processPayment(amount: $amount)
        ]);
    }
}


