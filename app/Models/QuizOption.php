<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizOption extends Model
{
    /**
     * fillable
     * @var array
     */
    protected $fillable = [
        'quiz_with_option_id',
        'choice',
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
            'id'                  => 'integer',
            'quiz_with_option_id' => 'integer',
            'is_correct'          => 'boolean',
            'created_at'          => 'datetime',
            'updated_at'          => 'datetime',
        ];
    }

    /**
     * question
     * @return BelongsTo<QuizWithOption, QuizOption>
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(QuizWithOption::class, 'quiz_with_option_id');
    }
}
