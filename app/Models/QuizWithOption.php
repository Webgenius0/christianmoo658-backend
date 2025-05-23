<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class QuizWithOption extends Model
{
    /**
     * fillable
     * @var array
     */
    protected $fillable = [
        'topic',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id'         => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * questions
     * @return HasMany<OptionQuizQuestion, QuizWithOption>
     */
    public function questions(): HasMany
    {
        return $this->hasMany(OptionQuizQuestion::class, 'quiz_with_option_id');
    }

    /**
     * courseContent
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne<CourseContent, Lesson>
     */
    public function courseContent(): MorphOne
    {
        return $this->morphOne(CourseContent::class, 'contentable');
    }
}
