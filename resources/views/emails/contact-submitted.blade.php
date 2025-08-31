<h2>New Contact Message</h2>
<p><strong>Name:</strong> {{ $m->name }}</p>
<p><strong>Email:</strong> {{ $m->email }}</p>
<p><strong>Message:</strong></p>
<pre style="white-space:pre-wrap">{{ $m->message }}</pre>
<hr>
<p><small>IP: {{ $m->ip_address }} | UA: {{ $m->user_agent }}</small></p>


