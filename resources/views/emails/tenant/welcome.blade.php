@component('mail::message')
# Welcome {{ $tenant->name }}.

To let Digital Agency Would like to Welcome you to our Online Property Management Software.

In order to login kindly follow this 

@component('mail::button', ['url' =>  'http://eagent.toletdigital.com/'])
Url
@endcomponent

or By Typing this link  (eagent.toletdigital.com ) on your browser

Your login credentials are as follows.

Email/Username : {{ $tenant->email }}

Password: {{ $password }}

You have received this email because your Property Manager or Agent ( {{ $agent->name }} )  is using To-let Online Property Management Software to Manage ( {{ $room->listing->name }} ).

Kindly change Your Log In Credentials once you Log in Your Tenant's Portal on the Settings Menu.

We are glad to serve you better as our esteemed client


Thanks,<br>
{{ config('app.name') }}
@endcomponent
