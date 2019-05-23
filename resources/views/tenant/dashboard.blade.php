@extends('layouts.main2')

@section("page-title", "Dashboard")


@section('content')



<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Your Rentals Summary</h3>
                </div>
                <div class="col text-right">
                  
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              

                          <table id="example1" class="w-full table">
                <thead class="w-full bg-primary">
                  <tr class="">
                    <th scope="col">Unit Name</th>
                    <th scope="col">Listing</th>
                    <th scope="col">Agent</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Total</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($rentals as $rental)

                    <tr class="w-full" >
                        <td>
                       {{ $rental->rentable->name }}
                        </td>
                      <td>{{ $rental->rentable->listing->name }}</td>
                      <td>{{ $rental->agent->name or '' }}</td>
                      <td>{{ $rental->rentable->listing->owner->name or '' }}</td>
                      <td>{{ $rental->rentable->total }}</td>
                      <td> 
                        <a 
                          href="{{ route('tenant.room',['id' =>$rental->rentable->id ])}}" 
                          class="no-underline px-2 py-1 border-2 border-transparent hover:border-grey-lighter text-lg text-white font-bold bg-indigo rounded">
                          view
                        </a>
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
