
  <tr class="w-full" >
    <td><a class="link-class" href="{{ url('owner/tenant/'.$tenant->id )}}">{{ $tenant->name }} </a></td>
    <td>{{ $tenant->email }}</td>
    <td>{{ $tenant->phone }}</td>
    <td>{{ $tenant->aemail }}</td>
    <td>{{ $tenant->aphone }}</td>
    <td class="flex items-center justify-start">
      <edit-tenant :tenant="{{$tenant}}"></edit-tenant>
      <a href="{{ url('owner/tenant/'.$tenant->id )}}" class="btn btn-success">View</a>
    </td>
  </tr>
