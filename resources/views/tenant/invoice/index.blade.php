@extends('layouts.main2')

@section("page-title", "Invoices")

@section('content')



<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Invoices</h3>
                </div>
                <div class="col text-right">
                  
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              
               @include('tenant.invoice.invoices')
              
            </div>
            </div>
            
          </div>
        </div>
      </div>


@endsection
@section('scripts')
<script>
  nicetable('#invoices', {
      drawCallback: function () {
      var api = this.api();
      $( api.table().footer() ).html(
        api.column( 5, {page:'current'} ).data().sum()
      );
    }
  });
</script>
@endsection
