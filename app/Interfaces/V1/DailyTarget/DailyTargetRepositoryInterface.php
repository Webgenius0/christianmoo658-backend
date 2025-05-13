<?php

namespace App\Interfaces\V1\DailyTarget;

use App\Models\DailyTarget;
use Illuminate\Database\Eloquent\Collection;

interface DailyTargetRepositoryInterface
{
    /**
     * getAllDailyTarget
     * @return \Illuminate\Database\Eloquent\Collection<int, DailyTarget>
     */
    public function getAllDailyTarget(): Collection;
}
