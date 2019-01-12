<table id="invoices" class="w-full">
  <thead class="w-full">
    <tr class="bg-primary">
      <th scope="col">Invoice Date</th>
       <th scope="col">Period</th>
      <th scope="col">Invoice Number</th>
       <th scope="col">Invoice To</th>
      <th scope="col">Currency</th>
      <th scope="col">Amount</th>
      <th scope="col">Balance</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($invoices as $invoice)
      <tr class="w-full {{ $invoice->isPaid ? 'text-green' : 'text-black' }} font-bold" >
        <td>{{ $invoice->created_at->format('d M Y') }}</td>
         <td>{{ $invoice->period->format('M Y') }}</td>
        <td> {{ $invoice->invoice_id }}</td>
         <td>{{ $invoice->tenant->name }}</td>
        <td>{{ $invoice->currency }}</td>
        <td>{{ number_format($invoice->amount,2) }}</td>
        <td>{{ number_format($invoice->balance,2) }}</td>
        <td>
          <div class="flex justify-around">
          <a href="{{asset('storage/invoices/'.$invoice->tenant_id.'/'.$invoice->invoice_id.'.pdf')}}" target="_blank" class="no-underline px-4 py-2 bg-teal text-white rounded">view</a>
          @unless($invoice->isPaid)
          <a href="" class="no-underline px-4 py-2 bg-indigo text-white rounded">Pay</a>
          @endunless
        </div>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
