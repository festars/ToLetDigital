
  <tr class="w-full" >
    <td><a class="link-class" href="{{ route('tenant.show',['id' =>$tenant->id ])}}">{{ $tenant->name }} </a></td>
    <td>{{ $tenant->email }}</td>
    <td>{{ $tenant->phone }}</td>
    <td>{{ $tenant->aphone }}</td>
    <td>{{ $tenant->aemail }}</td>
    <td class="flex items-center justify-start">
      <edit-tenant :tenant="{{$tenant}}"></edit-tenant>
    </td>
  </tr>
