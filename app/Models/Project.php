<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'summary',
        'description',
        'role',
        'team_size',
        'timeline_start',
        'timeline_end',
        'tech_stack',
        'repo_url',
        'demo_url',
        'metrics',
        'hero_image_path',
        'order',
        'published_at',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'metrics' => 'array',
        'timeline_start' => 'date',
        'timeline_end' => 'date',
        'published_at' => 'datetime',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function media(): HasMany
    {
        return $this->hasMany(ProjectMedia::class);
    }
}


