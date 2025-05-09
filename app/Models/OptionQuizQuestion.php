<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OptionQuizQuestion extends Model
{
    /**
     * fillable
     * @var array
     */
    protected $fillable = [
        'quiz_with_option_id',
        'question',
        'tip',
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
            'id'                  => 'integer',
            'quiz_with_option_id' => 'integer',
            'created_at'          => 'datetime',
            'updated_at'          => 'datetime',
        ];
    }

    /**
     * quiz
     * @return BelongsTo<QuizWithOption, OptionQuizQuestion>
     */
    public function quiz(): BelongsTo
    {
        return $this->belongsTo(QuizWithOption::class);
    }

    /**
     * options
     * @return HasMany<QuestionOption, OptionQuizQuestion>
     */
    public function options():HasMany
    {
        return $this->hasMany(QuestionOption::class);
    }
}
