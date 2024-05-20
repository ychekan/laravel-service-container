<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\JsonResponse;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @param User $user
     * @return JsonResponse
     */
    public function view(User $user): JsonResponse
    {
        return response()->json([
            'data' => [
                'user' => $user->withoutRelations(),
                'profile' => $user->profile->only((new Profile)->getFillable()),
            ],
        ]);
    }
}



