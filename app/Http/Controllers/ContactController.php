<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\ContactService;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function __construct(private readonly ContactService $contact)
    {
    }

    public function store(ContactRequest $request, string $locale): RedirectResponse
    {
        $validated = $request->validated();
        $validated['ip_address'] = $request->ip();
        $validated['user_agent'] = (string) $request->header('User-Agent');
        $validated['spam_score'] = $request->boolean('hp') ? 10 : 0;    			// honeypot

        $this->contact->submit($validated);

        return back()->with('success', __('Thanks! I will get back to you soon.'));
    }
}


