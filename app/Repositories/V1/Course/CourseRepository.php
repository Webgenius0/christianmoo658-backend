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
            return Course::orderByDesc('id')->get();
        } catch (Exception $e) {
            Log::error('CourseRepository::getAllCourses', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }

    public function getCourseById($id)
    {

    }

    public function createCourse(array $data)
    {

    }

    public function updateCourse($id, array $data)
    {

    }

    public function deleteCourse($id)
    {

    }

    public function getCourseBySlug($slug)
    {

    }

    public function getCourseContents($courseId)
    {

    }

    public function addLessonToCourse($courseId, $lesson)
    {

    }
}
