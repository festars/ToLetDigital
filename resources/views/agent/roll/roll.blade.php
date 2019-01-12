 <tr class="w-full" >
  <td><a class="link-class" href="{{ route('tenant.show',['id' =>$room->id or ''])}}">{{ $room->listing->name or ''}} </a></td>
  <td>{{ $room->name }}</td>
  <td>
    @if($room->tenants->count() > 0 )
    <span class="bg-green rounded-full uppercase p-2 text-white font-normal"> Occupied </span>
    @else
    <span class="bg-orange rounded-full uppercase p-2 text-white font-normal"> Vacant </span>
    @endif
  </td>
  <td>
    <ul>
      @foreach($room->tenants as $tenant)
        <li> {{ $tenant->name }}</li>
      @endforeach
    </ul>
  </td>
  <td>{{ $room->accounts->first()->currency or '' }}</td>
  <td>{{ number_format($room->accounts->sum('amount'),2) }}</td>
  <td class="flex items-center justify-start">
    <a 
      href="{{ route('room.show',['id' =>$room->id ])}}" 
      class="no-underline px-2 py-1 border-2 border-transparent hover:border-grey-lighter text-lg text-white font-bold bg-indigo rounded">
      view
    </a>
  </td>
</tr>
