@extends('layouts.main2')

@section("page-title", "Vendors")

@section('content')


<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Vendors</h3>
                </div>
                <div class="col text-right">
                  <new-vendor></new-vendor>
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              
                  <table class="table" id="example1">
                    <thead class="bg-primary">
                      
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Type</th>
                      <th>Service Offered</th>
                      <th>Status</th>
                      <th>Actions</th>
                      
                    </thead>
                   @foreach($vendors as $vendor)
                     <tr>
                      <td>{{$vendor->name}}</td>
                      <td>{{$vendor->email}}</td>
                      <td>{{$vendor->phone}}</td>
                      <td>{{$vendor->type}}</td>
                      <td>{{$vendor->serviceoffered}}</td>
                      <td>
                          @if($vendor->approved == 1)
                              <label class="label label-succuess">Approved</label>
                          @else
                               <label class="label label-danger">Not Approved</label>
                          @endif
                              
                      </td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                       @if($vendor->approved == 1)
                              <a href="{{ url('/admin/vendor/decline',['id' =>$vendor->id ])}}" class="btn btn-danger">Decline</a>
                          @else
                               <a href="{{ url('/admin/vendor/aprrove',['id' =>$vendor->id ])}}" class="btn btn-primary">Approve</a>
                          @endif
                         <delete-item url="/admin/vendor/{{$vendor->id}}"></delete-item>
                        </div>
                      </td>
                    </tr>
                  @endforeach
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