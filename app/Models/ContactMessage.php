<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message',
        'ip_address',
        'user_agent',
        'spam_score',
        'processed_at',
    ];

    protected $casts = [
        'processed_at' => 'datetime',
        'spam_score' => 'float',
    ];
}


