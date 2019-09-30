@extends('layouts.main2')

@section("page-title", "Properties")


@section('content')

<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Properties</h3>
                </div>
                <div class="col text-right">
                   
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              
                            <table id="example1" class="w-full">
                <thead class="w-full content-center uppercase">
                  <tr class="bg-tolet-blue content-center">
                    <th scope="col">Name</th>
                    <th scope="col">Property Type</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Tenants</th>
                    <th scope="col">Units</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($listings as $listing)
                    <tr>
                      <td>{{ $listing->name or '' }}</td>
                      <td>{{ $listing->ptype->name or '' }}</td>
                      <td>{{ $listing->owner->name }}</td>
                      <td>{{ $listing->total_tenants }}</td>
                      <td>{{ $listing->total_units }}</td>
                      @if($listing->status === null)
                      <td><span class = "bg-orange rounded-full uppercase p-2 text-white font-normal">Pending</span></td>
                      @elseif($listing->status === 1)
                      <td><span class = "bg-green rounded-full uppercase p-2 text-white font-normal">Approved</span></td>
                      @else
                      <td><span class = "bg-red rounded-full uppercase p-2 text-white font-normal">Suspended</span></td>
                      @endif
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            
                          @if($listing->status == 1)
                              <a href="{{ url('/admin/listing/decline',['id' =>$listing->id ])}}" class="btn btn-danger">Decline</a>
                          @else
                               <a href="{{ url('/admin/listing/aprrove',['id' =>$listing->id ])}}" class="btn btn-primary">Approve</a>
                          @endif
                          
                          
                          <delete-item url="/admin/listing/{{$listing->id}}"></delete-item>
                          
                          
                         
                         
                        </div>
                          
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>


              
            </div>
            </div>
            
          </div>
        </div>
      </div>



@endsection

@section('scripts')
<script>
 $('#example1').DataTable( {
      dom: 'Bfrtip',
  buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdfHtml5'
  ]});
</script>
@endsection

