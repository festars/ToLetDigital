@component('mail::message')
# Welcome {{ $tenant->name }}.

To let Digital Agency Would like to Welcome you to Our Online Property Management Software.

In order to login kindly follow this link 

@component('mail::button', ['url' =>  'http://eagent.toletdigital.com/'])
Url
@endcomponent

or By Typing  (www.etenant.toletdigital.com ) On Your Browser

Your login credentials are as follows.

Email/Username : <b>{{ $tenant->email }}</b>

Password: <b>{{$password}}</b>

You have received this email because your Property Manager / Agent ( Kalolwanga Engineering Services Ltd ) is using To-let Online Property Management Software to Manage ( MAGGI VILLA APARTMENTS ).

Kindly change Your Log In Credentials once you Log in Your Tenant's Portal on the Settings Menu.

We are happy to have you as our esteemed client.

Regards,<br>
{{ config('app.name') }}

<a href="mailto:support@toletdigital.com">Support Email</a>
@endcomponent
