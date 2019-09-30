@extends('layouts.main2')

@section("page-title", "Rent Roll")

@section('content')

<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Rent Roll</h3>
                </div>
                <div class="col text-right">
                  <new-invoice :properties="{{$properties}}"></new-invoice>
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              
              <table id="example1" class=" w-full table">
                
                <thead class="">
                  <tr class="w-full bg-tolet-blue">
                    <th scope="col">Property</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tenants</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                      @include('owner.roll.roll')
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
          <div>
            <p><h3>Rent Roll</h3></p>
            
            
          </div>
          
          <div>
            <new-invoice :properties="{{$properties}}"></new-invoice>
           </div>
        </div>
        <div class="flex justify-between items-center my-4">
            
              <table id="example1" class=" w-full table">
                
                <thead class="">
                  <tr class="w-full bg-tolet-blue">
                    <th scope="col">Property</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tenants</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                      @include('agent.roll.roll')
                    @endforeach
                </tbody>
              
              </table>
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
