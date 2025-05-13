<?php

namespace App\Interfaces\V1\User;

interface UserRepositoryInterface
{
    /**
     * attachCouse
     * @param int $userId
     * @param array $data
     * @return array{attached: array, detached: array, updated: array}
     */
    public function attachCouse(int $userId, array $data): array;
}
