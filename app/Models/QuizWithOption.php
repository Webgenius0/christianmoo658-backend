<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class QuizWithOption extends Model
{
    /**
     * fillable
     * @var array
     */
    protected $fillable = [
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
            'id'         => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * quiz
     * @return MorphOne<Quiz, QuizWithOption>
     */
    public function quiz(): MorphOne
    {
        return $this->morphOne(Quiz::class, 'quizeable');
    }
}
