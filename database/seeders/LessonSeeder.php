<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Get all course IDs
        $courses = DB::table('courses')->select('id')->get();

        foreach ($courses as  $course) {
            $count =rand(21, 31);

            for ($j = 1; $j <= $count; $j++) {
                DB::table('lessons')->insert([
                    'course_id' => $course->id,
                    'index' => $j,
                    'title' => 'Lesson ' . $j . ': ' . $faker->sentence(3),
                    'content' => implode("\n\n", $faker->paragraphs(8)),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
