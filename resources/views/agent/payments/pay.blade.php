<table id="payment" class="w-full">
  <thead class="w-full">
    <tr class="w-full content-center text-tolet-blue bg-white uppercase">
        <th scope="col">Invoice Number</th>
        <th scope="col">Payment Date</th>
        <th scope="col">Period</th>     
        <th scope="col">Paid by</th>
        <th scope="col">Method</th>
        <th scope="col">Amount</th>
        <th scope="col">Balance</th>
        <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($invoices as $invoice)
      <tr class="w-full {{ $invoice->isPaid ? 'text-green' : 'text-black' }} font-bold" >
            <td> {{ $invoice->invoice_id }}</td>
            <td>{{ $invoice->created_at->format('d M Y') }}</td>
            <td>{{ $invoice->period->format('M Y') }}</td>
            <td>{{ $invoice->payment_by }}</td>
            <td>{{ $invoice->payment_method }}</td>
            <td>{{ number_format($invoice->amount,2) }}</td>
            <td>{{ number_format($invoice->balance,2) }}</td>
            <td>
                <div class="flex justify-around">
                <span>
                    <email-invoice invoice="{{ $invoice->id }}" email="{{$invoice->tenant->email}}"></email-invoice>
                </span>
                <span>
                    <a href="{{ $invoice->invoice_url }}" class="no-underline px-4 py-2 bg-teal text-white rounded">view</a>
                </span>
                @if($invoice->isPaid)          
                @else
                <span>
                    <pay-invoice invo="{{ $invoice }}"></pay-invoice>
                </span>
                @endif
                </div>
            </td>
      </tr>
    @endforeach
  </tbody>
</table>
