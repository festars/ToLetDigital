@extends('layouts.main')
@section('content')


    <div class="flex flex-col ">
        <div class="flex justify-between items-center my-4 bg-white py-2 px-4 rounded shandow-sm">
          <div class="px-2">
            <p>
              <h5 class="uppercase text-sm text-tolet-blue">Type</h5>
              <h3 class="uppercase mt-2 text-black text-lg"> {{ $maintenance->maintenancetype }}</h3>
            </p>
          </div>
          <div class="px-2">
             <p>
              <h5 class="uppercase text-sm text-tolet-blue">Cost</h5>
              <h3 class="uppercase mt-2 text-black text-lg">{{ $maintenance->cost }}</h3>
            </p>
          </div>
          <div>
            <p>
              <h5 class="uppercase text-sm text-tolet-blue">Notes</h5>
              <h3 class="uppercase mt-2 text-black text-lg">{{ $maintenance->notes }}</h3>
            </p>
           </div>
           
           <div>
            <p>
              <h5 class="uppercase text-sm text-tolet-blue">Raised By :</h5>
              <h3 class="uppercase mt-2 text-black text-lg">{{ $maintenance->agent_id }}</h3>
            </p>
           </div>
        </div>
        <div class="flex justify-between items-center my-4 ">
            <div class="w-full">
              <div class="flex items-start">
                <div class="left-table w-1/2 mx-4 p-4">
                  
             
              </div>
              
            </div>
         </div>
    </div>
@endsection
@section('scripts')
<script>
  nicetable('#tenants');
  nicetable('#finance', {
      drawCallback: function () {
      var api = this.api();
      $( api.table().footer() ).html(
        api.column( 3, {page:'current'} ).data().sum()
      );
    }
  });
  nicetable('#payments');

</script>
@endsection
