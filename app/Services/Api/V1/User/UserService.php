<?php

namespace App\Services\Api\V1\User;

use App\Interfaces\V1\User\UserRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserService
{
    /**
     * userRepository
     * @var UserRepositoryInterface
     */
    private UserRepositoryInterface $userRepository;
    private $user;

    /**
     * construct
     * @param \App\Interfaces\V1\User\UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->user = Auth::user();

    }

    /**
     * subscribeCourse
     * @param array $data
     * @return array{attached: array, detached: array, updated: array}
     */
    public function subscribeCourse(array $data): array
    {
        try {
            return $this->userRepository->attachCouse($this->user->id, $data);
        }catch(Exception $e) {
            Log::error('UserService::subscribeCourse', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }

}
