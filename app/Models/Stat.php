<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $fillable = ['value', 'label', 'accent', 'order'];
    protected $casts = [
        'accent' => 'boolean',
    ];
}
