<table id="invoices" class="w-full">
  <thead class="w-full">
    <tr class="bg-tolet-blue">
      <th scope="col">Invoice Date</th>
       <th scope="col">Period</th>
      <th scope="col">Invoice Number</th>
       <th scope="col">Invoice To</th>
      <th scope="col">Currency</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($invoices as $invoice)
      <tr class="w-full {{ $invoice->isPaid ? 'text-green' : 'text-black' }} font-bold" >
        <td>{{ $invoice->created_at->format('d M Y') }}</td>
         <td>{{ $invoice->period->format('M Y') }}</td>
        <td> {{ $invoice->invoice_id }}</td>
         <td>{{ $invoice->rental->name }}</td>
        <td>{{ $invoice->currency }}</td>
        <td>{{ number_format($invoice->amount,2) }}</td>
        <td>
          <div class="flex justify-around">
          <span>
              <email-invoice invoice="{{ $invoice->id }}" email="{{$invoice->tenant->email}}"></email-invoice>
          </span>
          <span class="flex justify-center items-center">
              <a target="_blank" href="{{asset('storage/invoices/'.$invoice->tenant_id.'/'.$invoice->invoice_id.'.pdf')}}" class="no-underline px-4 py-2 bg-teal text-white rounded">view</a>
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
