<?php

namespace App\Http\Controllers\Api\V1\DailyTarget;

use App\Http\Controllers\Api\V1\Controller;
use App\Services\Api\V1\DailyTarget\DailyTargetService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DailyTargetController extends Controller
{
    /**
     * dailyTargetService
     * @var DailyTargetService
     */
    protected DailyTargetService $dailyTargetService;

    /**
     * construct
     * @param \App\Services\Api\V1\DailyTarget\DailyTargetService $dailyTargetService
     */
    public function __construct(DailyTargetService $dailyTargetService)
    {
        $this->dailyTargetService = $dailyTargetService;
    }

    /**
     * index
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $response = $this->dailyTargetService->getDailyTargetList();
            return $this->success(200, 'daily target list', $response);
        } catch (Exception $e) {
            Log::error('DailyTargetController::index', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return $this->error(500, 'server error', $e->getMessage());
        }
    }
}
