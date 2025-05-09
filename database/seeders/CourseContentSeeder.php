<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\CourseContent;
use App\Models\QuizWithOption;
use App\Models\OptionQuizQuestion;
use App\Models\QuestionOption;
use App\Models\TrueFalseQuiz;
use App\Models\TrueFalseQuestion;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CourseContentSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach (Course::all() as $course) {

            // 20 Lessons
            for ($i = 1; $i <= 20; $i++) {
                $lesson = Lesson::create([
                    'title' => "Lecture {$i} - " . $faker->sentence(3),
                    'content' => $faker->paragraphs(5, true),
                ]);

                CourseContent::create([
                    'course_id' => $course->id,
                    'contentable_id' => $lesson->id,
                    'contentable_type' => Lesson::class,
                    'position' => $i,
                ]);
            }

            $position = 21;

            // 3 Multiple Choice Quizzes
            for ($i = 1; $i <= 3; $i++) {
                $quiz = QuizWithOption::create([
                    'topic' => "Quiz MCQ {$i} - " . $faker->sentence(3),
                ]);

                for ($q = 1; $q <= 5; $q++) {
                    $question = OptionQuizQuestion::create([
                        'quiz_with_option_id' => $quiz->id,
                        'question' => $faker->sentence(),
                        'tip' => $faker->sentence(),
                    ]);

                    // 4 Options, one correct
                    $correctIndex = rand(0, 3);
                    for ($j = 0; $j < 4; $j++) {
                        QuestionOption::create([
                            'option_quiz_question_id' => $question->id,
                            'option' => $faker->word(),
                            'is_correct' => $j === $correctIndex,
                        ]);
                    }
                }

                CourseContent::create([
                    'course_id' => $course->id,
                    'contentable_id' => $quiz->id,
                    'contentable_type' => QuizWithOption::class,
                    'position' => $position++,
                ]);
            }

            // 2 True/False Quizzes
            for ($i = 1; $i <= 2; $i++) {
                $tfQuiz = TrueFalseQuiz::create([
                    'topic' => "True/False Quiz {$i} - " . $faker->sentence(3),
                ]);

                for ($q = 1; $q <= 5; $q++) {
                    TrueFalseQuestion::create([
                        'true_false_quiz_id' => $tfQuiz->id,
                        'question' => $faker->sentence(),
                        'tip' => $faker->sentence(),
                        'answer' => (bool)rand(0, 1),
                    ]);
                }

                CourseContent::create([
                    'course_id' => $course->id,
                    'contentable_id' => $tfQuiz->id,
                    'contentable_type' => TrueFalseQuiz::class,
                    'position' => $position++,
                ]);
            }
        }
    }
}
