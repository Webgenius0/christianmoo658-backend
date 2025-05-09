<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DalyTarget extends Model
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
            'time'       => 'time',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
