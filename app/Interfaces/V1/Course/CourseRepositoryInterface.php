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
}
