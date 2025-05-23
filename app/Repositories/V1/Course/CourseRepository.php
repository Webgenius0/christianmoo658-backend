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

    /**
     * getCourseById
     * @param Course $course
     * @return Course
     */
    public function getCourseById(Course $course): Course
    {
        try {
            $course->load(['contents' => function ($query) {
                $query->orderBy('position', 'asc');
            }]);
            $course->setVisible(['contents']);
            return $course;
        } catch (Exception $e) {
            Log::error('CourseRepository::getCourseById', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }

    public function createCourse(array $data)
    {
        try {
        } catch (Exception $e) {
            Log::error('CourseRepository::createCourse', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }

    public function updateCourse($id, array $data)
    {
        try {
        } catch (Exception $e) {
            Log::error('CourseRepository::updateCourse', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }

    public function deleteCourse($id)
    {
        try {
        } catch (Exception $e) {
            Log::error('CourseRepository::deleteCourse', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }

    public function getCourseBySlug($slug)
    {
        try {
        } catch (Exception $e) {
            Log::error('CourseRepository::getCourseBySlug', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }

    public function getCourseContents($courseId)
    {
        try {
        } catch (Exception $e) {
            Log::error('CourseRepository::getCourseContents', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }

    public function addLessonToCourse($courseId, $lesson)
    {
        try {
        } catch (Exception $e) {
            Log::error('CourseRepository::addLessonToCourse', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }
}
