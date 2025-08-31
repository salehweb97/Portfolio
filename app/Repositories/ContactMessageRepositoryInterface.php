<?php

namespace App\Repositories;

use App\Models\ContactMessage;

interface ContactMessageRepositoryInterface
{
    public function create(array $data): ContactMessage;
}


