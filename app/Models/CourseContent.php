<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class CourseContent extends Model
{
    /**
     * fillable
     * @var array
     */
    protected $fillable = [
        'course_id',
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
     * contentable
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo<Model, CourseContent>
     */
    public function contentable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * course
     * @return BelongsTo<Course, CourseContent>
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
