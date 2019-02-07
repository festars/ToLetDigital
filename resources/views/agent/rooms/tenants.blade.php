<table id="tenants" class="w-full table">
  @if($room->tenants->count() > 0)
  <thead class="w-full">
    <tr class="w-full content-center bg-tolet-blue">
      <th scope="col">Tenant Name</th>
      <th scope="col">Phone</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
     @foreach($room->tenants as $tenant)
      <tr class="w-full text-green font-bold" >
        <td><a class="text-green underline hover:text-black" href="{{ route('room.show',['id' =>$room->id ])}}">{{ $tenant->name }}</a></td>
        <td>{{ $tenant->phone }}</td>
        <td>{{ $tenant->created_at->format('d-m-Y') }}</td>
        <td>Now</td>
        <td>
          <div class="flex">
            <remove-tenant url="/agent/tenant/{{ $tenant->id}}" unit="{{$room->id}}"></remove-tenant>
          </div>
        </td>
      </tr>
      @endforeach
  </tbody>
  @else
  Unit Vacant.
  @endif
</table>
