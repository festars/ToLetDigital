 <table id="finance" class="w-full">
  <thead class="w-full">
    <tr class="w-full content-center bg-tolet-blue py-2">
      <th scope="col">Account</th>
      <th scope="col">Period</th>
      <th scope="col">Currency</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($room->accounts as $account)
      <tr class="w-full" >
        <td><a href="{{ route('room.show',['id' =>$room->id ])}}">{{ $account->name }}</a></td>
        <td>{{ $account->period->name }}</td>
        <td>{{ $account->currency }}</td>
        <td>{{ $account->amount }}</td>
        <td>
          <div class="flex justify-around items-center">
              <edit-account :account="{{ $account}}"></edit-account>
              <remove-account url="/agent/account/{{ $account->id}}"></remove-account>
          </div>
        </td>
      </tr>
      @endforeach

  </tbody>
  <tfoot>

  </tfoot>
</table>
