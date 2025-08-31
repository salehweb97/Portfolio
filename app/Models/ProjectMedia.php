<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'type',
        'url',
        'alt',
        'width',
        'height',
        'order',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}


