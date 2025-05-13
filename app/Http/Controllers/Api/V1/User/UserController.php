<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\Api\V1\User\SubscribeRequest;
use App\Services\Api\V1\User\UserService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * userService
     * @var UserService
     */
    private UserService $userService;

    /**
     * construct
     * @param \App\Services\Api\V1\User\UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * subscribe
     * @param \App\Http\Requests\Api\V1\User\SubscribeRequest $subscribeRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribe(SubscribeRequest $subscribeRequest):JsonResponse
    {
        try {
            $validatedData = $subscribeRequest->validated();
            $response = $this->userService->subscribeCourse($validatedData);
            return $this->success(201,'subscribed successfully', $response);
        }catch (Exception $e) {
            Log::error('DailyTargetController::index', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return $this->error(500, 'server error', $e->getMessage());
        }
    }

}
