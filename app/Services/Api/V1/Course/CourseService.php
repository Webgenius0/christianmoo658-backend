<?php

namespace App\Services\Api\V1\Course;

use App\Interfaces\V1\Course\CourseRepositoryInterface;
use App\Models\Course;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class CourseService
{
    /**
     * courseRepository
     * @var CourseRepositoryInterface
     */
    private CourseRepositoryInterface $courseRepository;

    /**
     * construct
     * @param \App\Interfaces\V1\Course\CourseRepositoryInterface $courseRepository
     */
    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    /**
     * getCourseList
     * @return \Illuminate\Database\Eloquent\Collection<int, \App\Models\Course>
     */
    public function getCourseList(): Collection
    {
        try {
            return $this->courseRepository->getAllCourses();
        } catch (Exception $e) {
            Log::error('CourseService::getCourseList', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }

    /**
     * courseContents
     * @param \App\Models\Course $course
     * @return Collection
     */
    public function courseContents(Course $course): Collection
    {
        try {
            $course = $this->courseRepository->getCourseById($course);
            $groupedContents = $course->contents->groupBy('module');
            return $groupedContents;
        } catch (Exception $e) {
            Log::error('CourseService::getCourseList', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }
}
