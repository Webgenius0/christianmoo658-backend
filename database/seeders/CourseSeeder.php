<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Fundamentals of Business Management',
                'description' => 'Learn the core principles of managing a successful business, including planning, strategy, and leadership.',
            ],
            [
                'title' => 'Digital Marketing for Entrepreneurs',
                'description' => 'Explore essential digital marketing techniques such as SEO, email marketing, and social media campaigns tailored for startups and small businesses.',
            ],
            [
                'title' => 'Financial Accounting Basics',
                'description' => 'Understand the fundamentals of financial accounting including balance sheets, income statements, and cash flow analysis.',
            ],
        ];

        foreach ($courses as $index => $course) {
            DB::table('courses')->insert([
                'title' => $course['title'],
                'slug' => Str::slug($course['title']) . '-' . ($index + 1),
                'description' => $course['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
