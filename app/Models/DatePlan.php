<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatePlan extends Model
{
    protected $fillable = [
        'planner_name',
        'category_slug',
        'category_name',
        'place_slug',
        'place_name',
        'place_area',
        'planned_on',
        'planned_at',
        'note',
    ];

    protected function casts(): array
    {
        return [
            'planned_on' => 'date',
        ];
    }
}
