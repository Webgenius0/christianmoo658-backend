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
