<?php

namespace App\Jobs;

use App\Models\ContactMessage;
use App\Mail\ContactSubmitted;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendContactEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public ContactMessage $message)
    {
    }

    public function handle(): void
    {
        $to = config('mail.from.address');
        Mail::to($to)->send(new ContactSubmitted($this->message));
    }
}


