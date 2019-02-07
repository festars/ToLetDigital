@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <div class="flex items-center">
                <div class="left-table w-full my-4 mx-4">
                  <div class="flex justify-between items-center w-full ml-4 my-2">
                    <div><p class="uppercase font-semibold text-lg text-blue-dark underline">Payments</p></div>
                  </div>
                  @include('agent.payments.pay')
                </div>
              </div>
            </div>
         </div>
    </div>
@endsection
@section('scripts')
<script>
  nicetable('#payment', {
      drawCallback: function () {
      var api = this.api();
      $( api.table().footer() ).html(
        api.column( 5, {page:'current'} ).data().sum()
      );
      
    }
    
  });
</script>
@endsection
