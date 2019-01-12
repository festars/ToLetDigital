@component('mail::message')
# Your Invoice

Your Rent & utitlity Invoice is as follows:

@component('mail::button', ['url' =>  $invoice->invoice_url])
View Invoice
@endcomponent

##How to pay

#Portal
 1. Login into the portal
 2. Find the unpaid invoice
 3. Click on the Invoice.
 4. When opened Go to Pay panel and choose your mode of payment.
 5. Proceed to pay.

 #Mpesa
 1. Go to Mpesa on your phone.
 2. Chose Paybill.
 3. Enter Paybill number *******
 4. Enter your **Invoice number** as Account Number.
 5. Enter Amount.
 5. Enter your Pin.
 6. And Pay

 #Bank
 Pay through bank using your agent provided Account and submit the receipt to the Agents office.

 #Cash
 Go to Agent office and Pay cash.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
