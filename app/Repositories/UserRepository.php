<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository
{
    /**
     * @param int $id
     * @return User
     */
    public function getUserById(int $id): User
    {
        return User::find($id);
    }
}


