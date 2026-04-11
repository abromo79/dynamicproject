<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    protected $fillable = [
        'name',
        'program',
        'testimonial',
        'image',
        'is_featured',
        'sort_order',
        'status'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected $attributes = [
        'is_featured' => false,
        'sort_order' => 0,
        'status' => true,
    ];
}
