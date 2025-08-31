<?php

namespace App\Mail;

use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSubmitted extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public ContactMessage $messageModel)
    {
    }

    public function build(): self
    {
        return $this->subject('New portfolio contact message')
            ->view('emails.contact-submitted', [
                'm' => $this->messageModel,
            ]);
    }
}


