@extends('layouts.main2')


@section("page-title", "Payments")

@section('content')


<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Payments</h3>
                </div>
                <div class="col text-right">

                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              
                 @include('agent.payments.pay')


              
            </div>
            </div>
            
          </div>
        </div>
      </div>



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
