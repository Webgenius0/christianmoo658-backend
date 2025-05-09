<?php

namespace App\Repositories\V1\Course;

use App\Interfaces\V1\Course\CourseRepositoryInterface;
use App\Models\Course;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class CourseRepository implements CourseRepositoryInterface
{
    /**
     * getAllCourses
     * @return \Illuminate\Database\Eloquent\Collection<int, Course>
     */
    public function getAllCourses(): Collection
    {
        try {
            return Course::orderByDesc('created_at')->get();
        } catch (Exception $e) {
            Log::error('CourseRepository::getAllCourses', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }
}
