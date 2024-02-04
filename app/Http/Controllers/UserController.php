<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\JsonResponse;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    public function view(int $id, UserService $userService): JsonResponse
    {
        return response()->json([
            'data' => $userService->getUserData(id: $id)
        ]);
    }
}



