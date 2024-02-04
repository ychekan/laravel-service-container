<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

/**
 * Class UserService
 * @package App\Services
 */
class UserService
{
    /**
     * @param UserRepository $userRepository
     */
    public function __construct(
        private readonly UserRepository $userRepository
    ) {
    }

    /**
     * @param int $id
     * @return User
     */
    public function getUserData(int $id): User
    {
        return $this->userRepository->getUserById(id: $id);
    }
}


