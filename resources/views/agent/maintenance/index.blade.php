@extends('layouts.main2')

@section("page-title", "Property maintenances")


@section('content')

<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Property maintenances</h3>
                </div>
                <div class="col text-right">
                    <new-maintenance :rentals="{{ json_encode(Auth::user()->listings) }}"></new-maintenance>
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              
              <table id="example1" class="w-full">
                <thead class="w-full">
                  <tr class="w-full content-center bg-tolet-blue">
                    <th scope="col">Type</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Cause</th>
                    <th scope="col">status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($maintenances as $maintenance)
                    <tr class="w-full">
                      <td>{{ $maintenance->maintenancetype }}</td>
                      <td>{{ $maintenance->duedate }}</td>
                      <td>{{ $maintenance->cost }}</td>
                      <td>{{ $maintenance->notes }}</td>
                      <td>{{ $maintenance->cause }}</td>
                      @if($maintenance->approvedon === NULL && $maintenance->declinedon === NULL)
                      <td><span class = "bg-orange rounded-full uppercase p-2 text-white font-normal">Pending</span></td>
                      @elseif($maintenance->declinedon !== NULL)
                      <td><span class = "bg-red rounded-full uppercase p-2 text-white font-normal">Declined</span></td>
                      @elseif($maintenance->approvedon !== NULL)
                      <td><span class = "bg-green rounded-full uppercase p-2 text-white font-normal">Approved</span></td>
                      @endif
                      <td>
                       
                         <div class="flex">
                           
                            <edit-maintenance :rentals="{{ json_encode(Auth::user()->listings) }}" :item="{{$maintenance}}"></edit-maintenance>
                            <delete-item url="/agent/maintenance/{{ $maintenance->id}}" ></delete-item>
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




    <!--<div class="flex flex-col m-4">
        <div class="flex justify-between items-center shandow-md my-4">
          <div class="px-2">
            <p><h3>Property maintenances</h3></p>
          </div>
             <div>
            <new-maintenance :rentals="{{ json_encode(Auth::user()->listings) }}"></new-maintenance>
            
           </div>
        </div>
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <table id="example1" class="w-full">
                <thead class="w-full">
                  <tr class="w-full content-center bg-tolet-blue">
                    <th scope="col">Type</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Cause</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($maintenances as $maintenance)
                    <tr class="w-full">
                      <td>{{ $maintenance->maintenancetype }}</td>
                      <td>{{ $maintenance->duedate }}</td>
                      <td>{{ $maintenance->cost }}</td>
                      <td>{{ $maintenance->notes }}</td>
                      <td>{{ $maintenance->cause }}</td>
                      <td>
                       
                         <div class="flex">
                           
                            <edit-maintenance :rentals="{{ json_encode(Auth::user()->listings) }}" :item="{{$maintenance}}"></edit-maintenance>
                            <delete-item url="/agent/maintenance/{{ $maintenance->id}}" ></delete-item>
                          </div>
                      </td>
                      
                     </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
         </div>
    </div>-->
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
