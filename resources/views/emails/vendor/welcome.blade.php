@component('mail::message')
# Welcome {{ $vendor->name }}.

To let Digital Agency Would like to Welcome you to our Online Property Management Software.

In order to login kindly follow this 

@component('mail::button', ['url' =>  'http://eagent.toletdigital.com/'])
Url
@endcomponent

or By Typing this link  (eagent.toletdigital.com ) on your browser

Your login credentials are as follows.

Email/Username : {{ $vendor->email }}

Password: {{ $password }}

You have received this email because you have been appeoved as a vendor.

Kindly change Your Log In Credentials once you Log in Your Tenant's Portal on the Settings Menu.

We are glad to serve you better as our esteemed vendor.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
