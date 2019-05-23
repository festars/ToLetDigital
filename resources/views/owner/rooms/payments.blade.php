<table id="payments" class="w-full">
  <thead class="w-full">
    <tr class="w-full content-center bg-tolet-blue">
      <th scope="col">Payment Date</th>
      <th scope="col">Payment Method</th>
       <th scope="col">Paid by</th>
      <th scope="col">Currency</th>
      <th scope="col">Amount</th>
      <th scope="col">Balance</th>
       <th scope="col">Reference</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($invoices as $invoice)
      <tr class="w-full text-green font-bold" >
        <td>{{ $invoice->created_at->format('jS M Y') }}</td>
        <td>{{ $invoice->payment_method }}</td>
         <td>{{ $invoice->payment_by }}</td>
        <td>{{ $invoice->currency }}</td>
        <td>{{ number_format($invoice->paid,2) }}</td>
        <td>{{ number_format($invoice->balance, 2) }}</td>
         <td>{{ $invoice->payment_reference }}</td>
        <td>Download/Email</td>
      </tr>
    @endforeach
  </tbody>
</table>
