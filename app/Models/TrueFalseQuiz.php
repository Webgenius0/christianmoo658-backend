<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrueFalseQuiz extends Model
{
    /**
     * fillable
     * @var array
     */
    protected $fillable = [
        'topic',
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
     * @return HasMany<TrueFalseQuestion, TrueFalseQuiz>
     */
    public function questions(): HasMany
    {
        return $this->hasMany(TrueFalseQuestion::class, 'true_false_quiz_id');
    }
}
