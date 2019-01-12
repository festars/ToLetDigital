@component('mail::message')
# Welcome {{ $tenant->name }}.

Tolet Digital would like to Welcome you to our Property management system. 

In order to login kindly follow this 

@component('mail::button', ['url' =>  'http://etenant.toletdigital.com/'])
Url
@endcomponent

Your login credentials are as follows.

    Email/Username : {{ $tenant->email }}

    Password: {{ $password }}
You have received this email because your agent( {{ $agent->name }} ) is using Tolet Digital to manage ( {{ $room->listing->name }} ).

Kindly change the credentials once you are logged in on the settings menu.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
