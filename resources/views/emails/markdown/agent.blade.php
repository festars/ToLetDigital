@component('mail::message')
# Welcome {{ $agent->name }}.

Tolet Digital would like to Welcome you to our Property management system. 

In order to login kindly follow this 

@component('mail::button', ['url' =>  'http://etenant.toletdigital.com/'])
Url
@endcomponent

or By Typing  (www.eagent.toletdigital.com ) On Your Browser

Your login credentials are as follows.

    Email/Username : <b>{{ $agent->email }}</b>

    Password: <b>{{$password}}</b>


Kindly change Your Log In Credentials once you Log in Your Agent's Portal on the Settings Menu.

We are happy to have you as our esteemed client.


Thanks,<br>
{{ config('app.name') }}

<a href="mailto:support@toletdigital.com">Support Email</a>
@endcomponent
