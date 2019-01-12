@component('mail::message')
# Welcome {{ $owner->name }}.

Tolet Digital would like to Welcome you to our Property management system. 

In order to login kindly follow this 

@component('mail::button', ['url' =>  'http://etenant.toletdigital.com/'])
Url
@endcomponent

Your login credentials are as follows.

    Email/Username : {{ $owner->email }}

    Password:secret


Kindly change the credentials once you are logged in on the settings menu.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
