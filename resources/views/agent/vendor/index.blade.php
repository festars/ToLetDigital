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
                        <div class="btn-group" role="group" aria-label="Basic example">
                          
                          <!--<a href="{{ url('/tenant/tasks',['id' =>$vendor->id ])}}" class="btn btn-primary">View</a>-->
                         <edit-vendor :vendor="{{$vendor}}" :rentals="{{ json_encode(Auth::user()->rentals->load('rentable')) }}"></edit-vendor>
                         <delete-item url="/agent/vendor/{{$vendor->id}}"></delete-item>
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
      
      
      
      
    <!--<div class="flex flex-col m-4">
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <div class="flex items-center">
                <div class="left-table w-full my-4 mx-4">
                  <div class="container mx-auto flex justify-between items-center w-full my-2">
                    <div><p class="uppercase font-semibold text-lg text-blue-dark underline">Vendors</p></div>
                    <div><new-vendor></new-vendor></div>
                  </div>
                  <table class="table" id="example1">
                    <thead class="bg-primary">
                      
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Phone Number</th>
                      <th>Type</th>
                      <th>Service Offered</th>
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
                        <div class="btn-group" role="group" aria-label="Basic example">
                          

                         <edit-vendor :vendor="{{$vendor}}" :rentals="{{ json_encode(Auth::user()->rentals->load('rentable')) }}"></edit-vendor>
                         <delete-item url="/agent/vendor/{{$vendor->id}}"></delete-item>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                  </table>
                  
                </div>
              </div>
            </div>
         </div>
    </div>-->
@endsection
@section('scripts')
<script>
  nicetable('#example1');
</script>
@endsection