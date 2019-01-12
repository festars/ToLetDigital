 <table id="finance" class="w-full">
  <thead class="w-full">
    <tr class="w-full content-center text-tolet-blue bg-white uppercase py-2">
      <th scope="col">Account</th>
      <th scope="col">Period</th>
      <th scope="col">Currency</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
      @foreach($room->accounts as $account)
      <tr class="w-full" >
        <td><a href="{{ route('room.show',['id' =>$room->id ])}}">{{ $account->name }}</a></td>
        <td>{{ $account->period->name }}</td>
        <td>{{ $account->currency }}</td>
        <td>{{ $account->amount }}</td>
      </tr>
      @endforeach

  </tbody>
  <tfoot>

  </tfoot>
</table>
