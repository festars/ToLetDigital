@extends('layouts.main2')

@section("page-title", "Unit Type")

@section('content')


<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Unit type</h3>
                </div>
                <div class="col text-right">
                  <new-unit-type></new-unit-type>
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              
                              <table id="example1" class="w-full">
                <thead class="w-full">
                  <tr class="w-full content-center text-tolet-blue bg-white uppercase">
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Descriptions</th>
                     <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($units as $unit)
                    <tr class="w-full">
                      <td>{{ $unit->id }}</td>
                      <td>{{ $unit->name }}</td>
                      <td>{{ $unit->description }}</td>
                      <td class="flex justify-around">
                        <span><edit-unit-type item="{{ json_encode($unit) }}"></edit-unit-type></span>
                        <span>Delete</span>
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
