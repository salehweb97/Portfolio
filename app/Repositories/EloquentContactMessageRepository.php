<?php

namespace App\Repositories;

use App\Models\ContactMessage;

class EloquentContactMessageRepository implements ContactMessageRepositoryInterface
{
    public function create(array $data): ContactMessage
    {
        return ContactMessage::create($data);
    }
}


