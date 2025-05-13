<?php

namespace App\Repositories\V1\User;

use App\Interfaces\V1\User\UserRepositoryInterface;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface
{
    /**
     * attachCouse
     * @param int $userId
     * @param array $data
     * @return array{attached: array, detached: array, updated: array}
     */
    public function attachCouse(int $userId, array $data): array
    {
        try {
            $user = User::find($userId);
            return $user->courses()->syncWithoutDetaching([
                $data['course_id'] => ['daily_target_id' => $data['daily_target_id']],
            ]);
        }catch (Exception $e) {
            Log::error('UserRepository::attachCouse', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }
}
