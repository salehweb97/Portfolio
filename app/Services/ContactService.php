<?php

namespace App\Services;

use App\Jobs\SendContactEmail;
use App\Models\ContactMessage;
use App\Repositories\ContactMessageRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ContactService
{
    public function __construct(private readonly ContactMessageRepositoryInterface $contacts)
    {
    }

    public function submit(array $data): ContactMessage
    {
        return DB::transaction(function () use ($data) {
            $message = $this->contacts->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'message' => $data['message'],
                'ip_address' => $data['ip_address'] ?? null,
                'user_agent' => $data['user_agent'] ?? null,
                'spam_score' => $data['spam_score'] ?? 0,
            ]);

            SendContactEmail::dispatch($message);

            return $message;
        });
    }
}


