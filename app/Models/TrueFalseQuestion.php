<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class TrueFalseQuestion extends Model
{
    /**
     * fillable
     * @var array
     */
    protected $fillable = [
        'true_false_quiz_id',
        'question',
        'tip',
        'answer',
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
            'id'                 => 'integer',
            'true_false_quiz_id' => 'integer',
            'answer'             => 'boolean',
            'created_at'         => 'datetime',
            'updated_at'         => 'datetime',
        ];
    }

    /**
     * quiz
     * @return BelongsTo<TrueFalseQuize, TrueFalseQuestion>
     */
    public function quiz(): BelongsTo
    {
        return $this->belongsTo(TrueFalseQuize::class, 'true_false_quiz_id');
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
