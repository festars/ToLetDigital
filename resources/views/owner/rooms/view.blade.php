@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center my-4 bg-white py-2 px-4 rounded shandow-sm">
          <div class="px-2">
            <p>
              <h5 class="uppercase text-sm text-tolet-blue">Unit Name</h5>
              <h3 class="uppercase mt-2 text-black text-lg"> {{ $room->name }}</h3>
            </p>
          </div>
          <div class="px-2">
             <p>
              <h5 class="uppercase text-sm text-tolet-blue">Property</h5>
              <h3 class="uppercase mt-2 text-black text-lg">{{ $room->listing->name }}</h3>
            </p>
          </div>
          <div>
            <p>
              <h5 class="uppercase text-sm text-tolet-blue">Owner</h5>
              <h3 class="uppercase mt-2 text-black text-lg">{{ $room->listing->owner->name }}</h3>
            </p>
           </div>
        </div>
        <div class="flex justify-between items-center my-4 ">
            <div class="w-full">
              <div class="flex items-start">
                <div class="left-table w-1/2 mx-4 p-4">
                  <div class="flex justify-between items-center w-full  my-2 ">
                    <div><p class="uppercase font-semibold text-lg text-blue-aqua underline">Tenants Details</p></div>
                    <div>
                        <div class="flex items-center">
                          <assign-tenant room="{{ $room->id }}"></assign-tenant>
                          <new-tenant room="{{ $room->id }}"></new-tenant>
                        </div>
                    </div>
                  </div>
                  @include('agent.rooms.tenants')
                </div>
                <div class="right-table w-1/2 mr-6 p-3">
                   <div class="flex justify-between items-center w-full my-2">
                    <div>
                      <p class="uppercase font-semibold text-lg text-blue-dark underline">Escrow Accounts</p>
                    </div>
                    <div>
                        <div class="flex items-center">
                          <new-account  room="{{ $room->id }}" :properties="{{$properties}}"></new-account>
                        </div>
                    </div>
                  </div>
                  @include('agent.rooms.accounts')
                </div>
              </div>
              <div class="flex items-center">
                <div class="left-table w-full my-4 mx-4 p-4">
                  <div class="flex justify-between items-center w-full my-2">
                    <div><p class="uppercase font-semibold text-lg text-blue-dark underline">Payments Details</p></div>
                  Payments
                  </div>
                  @include('agent.rooms.payments')
                </div>
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
