<table id="tenants" class="w-full">
  @if($room->tenants->count() > 0)
  <thead class="w-full">
    <tr class="w-full content-center text-tolet-blue bg-white uppercase">
      <th scope="col">Tenant Name</th>
      <th scope="col">Phone</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
    </tr>
  </thead>
  <tbody>
     @foreach($room->tenants as $tenant)
      <tr>
        <td>{{ $tenant->name }}</td>
        <td>{{ $tenant->phone }}</td>
        <td>{{ $tenant->created_at->format('d-m-Y') }}</td>
        <td>Now</td>
      </tr>
      @endforeach
  </tbody>
  @else
  Unit Vacant.
  @endif
</table>
