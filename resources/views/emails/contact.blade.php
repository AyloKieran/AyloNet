@component('mail::message')

# Contact Form Auto Response

Howdy {{ $name }},<br><br>
You recently sent this message to my contact form:

@component('mail::panel')
{{ $message }}
@endcomponent

I will try to respond to this email as quickly as possible.

@component('mail::subcopy')
Kind Regards,<br>
Kieran
@endcomponent

@endcomponent