<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $courses = [
            'Fundamentals of Business Strategy',
            'Digital Marketing and E-Commerce',
            'Financial Analysis and Investment Planning',
            'Introduction to Data Science and Analytics',
            'Project Management and Agile Methodologies',
            'Entrepreneurship and Innovation',
            'Leadership and Team Building',
            'UX/UI Design Principles',
            'Advanced Excel for Business Analytics',
            'Web Development with PHP and Laravel',
            'Python Programming for Beginners',
            'Machine Learning and AI Essentials',
            'Search Engine Optimization (SEO) Mastery',
            'Social Media Marketing Strategy',
            'Public Speaking and Presentation Skills',
            'Human Resource Management Fundamentals',
            'Cloud Computing with AWS',
            'Cybersecurity Basics for Professionals',
            'Customer Relationship Management (CRM)',
            'Negotiation and Conflict Resolution',
            'Mobile App Development with React Native',
            'Branding and Visual Identity Design',
            'Business Communication and Email Etiquette',
            'Ethical Hacking and Network Security',
            'Time Management and Productivity Hacks',
        ];


        foreach ($courses as $index => $title) {
            DB::table('courses')->insert([
                'title' => $title,
                'slug' => Str::slug($title) . '-' . ($index + 1),
                'description' => $faker->paragraphs(8, true),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
