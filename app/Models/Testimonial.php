<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [

        'reviewer_name',

        'occupation',

        'company',

        'location',

        'photo',

        'company_logo',

        'feedback',

        'rating',

        'order',

        'active',

    ];
    
    protected $casts = [
        'active' => 'boolean',
    ];
}