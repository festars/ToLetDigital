@extends('layouts.main2')

@section("page-title", "Property Owners")


@section('content')


<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Property Owners</h3>
                </div>
                <div class="col text-right">
                  
                 <new-owner></new-owner>
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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Properties</th>
                    <th scope="col">Tenants</th>
                     <th scope="col">Units</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($owners as $owner)
                    <tr class="w-full">
                      <td>{{ $owner->name }}</td>
                      <td>{{ $owner->email }}</td>
                      <td>{{ $owner->total_listings }}</td>
                      <td>{{ $owner->total_tenants }}</td>
                      <td>{{ $owner->total_units }}</td>
                      <td>
                       
                          
                        
                     <div class="flex">
                       
                        <edit-owner :item="{{$owner}}"></edit-owner>
                        <delete-item url="/agent/owner/{{ $owner->id}}" ></delete-item>
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
