<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DailyTarget extends Model
{
    /**
     * fillable
     * @var array
     */
    protected $fillable = [
        'time',
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
            'time'       => 'time',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * users
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<User, DailyTarget, \Illuminate\Database\Eloquent\Relations\Pivot>
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_user')
                    ->withPivot('course_id')
                    ->withTimestamps();
    }

    /**
     * courses
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<Course, DailyTarget, \Illuminate\Database\Eloquent\Relations\Pivot>
     */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_user')
                    ->withPivot('user_id')
                    ->withTimestamps();
    }
}
