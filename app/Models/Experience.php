<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'company',
        'position',
        'start_year',
        'end_year',
        'is_current',
        'responsibilities',
    ];

    protected function casts(): array
    {
        return [
            'responsibilities' => 'array',
        ];
    }
}
