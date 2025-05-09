<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Lesson extends Model
{
    /**
     * fillable
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
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
     * courseContent
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne<CourseContent, Lesson>
     */
    public function courseContent(): MorphOne
    {
        return $this->morphOne(CourseContent::class, 'contentable');
    }
}
