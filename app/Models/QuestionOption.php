<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionOption extends Model
{
    /**
     * fillable
     * @var array
     */
    protected $fillable = [
        'option_quiz_question_id',
        'option',
        'is_correct',
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
            'id'                      => 'integer',
            'option_quiz_question_id' => 'integer',
            'is_correct'              => 'boolean',
            'created_at'              => 'datetime',
            'updated_at'              => 'datetime',
        ];
    }

    /**
     * question
     * @return BelongsTo<OptionQuizQuestion, QuestionOption>
     */
    public function question():BelongsTo
    {
        return $this->belongsTo(OptionQuizQuestion::class, 'option_quiz_question_id');
    }
}
