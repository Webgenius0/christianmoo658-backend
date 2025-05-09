<?php

namespace App\Interfaces\V1\Auth;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    /**
     * createUser
     * @param array $credentials
     * @param $avatar
     * @param int $role
     * @return User
     */
    public function createUser(array $credentials, $avatar, int $role = 2): User;

    /**
     * Attempts to retrieve a user by their login credentials.
     *
     * @param array $credentials The user's login credentials (email and password).
     *
     * @return User|null The user object if found, null otherwise.
     */
    public function login(array $credentials):User|null;
}
