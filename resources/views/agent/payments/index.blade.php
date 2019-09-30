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

    
@endsection
@section('scripts')
<script>
 $('#payment').DataTable( {
      dom: 'Bfrtip',
  buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdfHtml5'
  ]});
</script>
@endsection
