<?php

namespace App\Http\Controllers\Api\V1\Course;

use App\Http\Controllers\Api\V1\Controller;
use App\Services\Api\V1\Course\CourseService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    /**
     * courseService
     * @var CourseService
     */
    protected CourseService $courseService;

    /**
     * construct
     * @param \App\Services\Api\V1\Course\CourseService $courseService
     */
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    /**
     * index
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $response = $this->courseService->getCourseList();
            return $this->success(200, 'all courses', $response);
        }catch (Exception $e) {
            Log::error('CourseService::getCourseList', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return $this->error(500, 'server error', $e->getMessage());
        }
    }
}
