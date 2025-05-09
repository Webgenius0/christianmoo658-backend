<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /**
     * fillable
     * @var array
     */
    protected $fillable = [
        'course_id',
        'index',
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
            'course_id'  => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * quizeable
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo<Model, Quiz>
     */
    public function quizeable()
    {
        return $this->morphTo();
    }

    /**
     * course
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Course, Quiz>
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
