@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
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
         </div>
    </div>
@endsection
@section('scripts')
<script>
  nicetable('#example1');
</script>
@endsection
