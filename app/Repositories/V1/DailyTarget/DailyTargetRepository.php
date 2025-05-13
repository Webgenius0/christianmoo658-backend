<?php

namespace App\Repositories\V1\DailyTarget;

use App\Interfaces\V1\DailyTarget\DailyTargetRepositoryInterface;
use App\Models\DailyTarget;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class DailyTargetRepository implements DailyTargetRepositoryInterface
{
    /**
     * getAllDailyTarget
     * @return \Illuminate\Database\Eloquent\Collection<int, DailyTarget>
     */
    public function getAllDailyTarget(): Collection
    {
        try {
            return DailyTarget::orderBy('time')->get();
        } catch (Exception $e) {
            Log::error('DailyTargetRepository::getAllDailyTarget', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }
}
