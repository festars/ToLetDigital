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
                    <th scope="col">Agent</th>
                    <th scope="col">Property</th>
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
                      <td>{{ $maintenance->agent->name }}</td>
                      <td>{{ $maintenance->listing->name }}</td>
                      <td>
                       
                         <div class="flex">
                           <!--@if($maintenance->approved == 1)-->
                           <!--<a href="{{ url('/owner/maintenance/decline',['id' =>$maintenance->id ])}}" class="btn btn-danger">Decline</a>-->
                           <!--@else-->
                           <!--<a href="{{ url('/owner/maintenance/approve',['id' =>$maintenance->id ])}}" class="btn btn-primary">Approve</a>-->
                           <!--@endif()-->
                            <edit-vendor-maintenance :rentals="{{ json_encode($maintenance->listing()) }}" :item="{{$maintenance}}"></edit-vendor-maintenance>
                            <delete-item url="/owner/maintenance/{{ $maintenance->id}}" ></delete-item>
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
  nicetable('#example1');
</script>
@endsection
