@component('mail::message')
# Contact Details

Hi Mr/Mrs Muhammad Mustafa, your have new contact on catchmango.com site, Details are below.
<br>
@component('mail::panel')
Name: <strong> {{ $contact->name }} </strong> <br>
Email: <strong> {{ $contact->email }} </strong> <br>
Subject: <strong> {{ $contact->subject }} </strong> <br>
Message: <strong> {{ $contact->message }} </strong> <br>

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
