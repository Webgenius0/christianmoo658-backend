<?php

namespace App\Services\Api\V1\DailyTarget;

use App\Interfaces\V1\DailyTarget\DailyTargetRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class DailyTargetService
{
    /**
     * dailyTargetRepository
     * @var DailyTargetRepositoryInterface
     */
    protected DailyTargetRepositoryInterface $dailyTargetRepository;

    /**
     * construct
     * @param \App\Interfaces\V1\DailyTarget\DailyTargetRepositoryInterface $dailyTargetRepository
     */
    public function __construct(DailyTargetRepositoryInterface $dailyTargetRepository)
    {
        $this->dailyTargetRepository = $dailyTargetRepository;
    }

    /**
     * getDailyTargetList
     * @return \Illuminate\Database\Eloquent\Collection<int, \App\Models\DailyTarget>
     */
    public function getDailyTargetList():Collection
    {
        try {
            return $this->dailyTargetRepository->getAllDailyTarget();
        }catch(Exception $e) {
            Log::error('DailyTargetService::getDailyTargetList', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }

}
