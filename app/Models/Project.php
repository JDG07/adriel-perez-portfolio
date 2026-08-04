<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'excerpt',
        'description',
        'client',
        'year',
        'project_url',
        'featured',
        'order',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('order');
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    protected static function booted()
    {
        static::saving(function ($project) {
            if (blank($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
        });
    }

}