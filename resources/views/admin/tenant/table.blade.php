
  <tr class="w-full" >
    <td><a class="link-class" href="{{ route('tenant.show',['id' =>$tenant->id ])}}">{{ $tenant->name }} </a></td>
    <td>{{ $tenant->email }}</td>
    <td>{{ $tenant->phone }}</td>
    <td>{{ $tenant->aemail }}</td>
    <td>{{ $tenant->aphone }}</td>
    <td class="flex items-center justify-start">
      @if($tenant->isApproved == 1)
                              <a href="{{ url('/admin/tenant/decline',['id' =>$tenant->id ])}}" class="btn btn-danger">Decline</a>
                          @else
                               <a href="{{ url('/admin/tenant/aprrove',['id' =>$tenant->id ])}}" class="btn btn-primary">Approve</a>
                          @endif
      <a href="{{ route('tenant.show',['id' =>$tenant->id ])}}" class="btn btn-success">View</a>
    </td>
  </tr>
