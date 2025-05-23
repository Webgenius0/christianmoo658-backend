<?php

namespace App\Interfaces\V1\Course;

use App\Models\Course;
use Illuminate\Database\Eloquent\Collection;

interface CourseRepositoryInterface
{
    /**
     * getAllCourses
     * @return \Illuminate\Database\Eloquent\Collection<int, Course>
     */
    public function getAllCourses(): Collection;

    /**
     * getCourseById
     * @param Course $course
     * @return Course
     */
    public function getCourseById(Course $course): Course;
    public function getCourseBySlug($slug);
    public function createCourse(array $data);
    public function updateCourse($id, array $data);
    public function deleteCourse($id);
    public function getCourseContents($courseId);
    public function addLessonToCourse($courseId, $lesson);
}
