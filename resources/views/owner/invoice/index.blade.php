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
                    
                    Payments
                    
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              

              @include('agent.invoice.invoices')

              
            </div>
            </div>
            
          </div>
        </div>
      </div>




    <!--<div class="flex flex-col m-4">
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <div class="flex items-center">
                <div class="left-table w-full my-4 mx-4">
                  <div class="flex justify-between items-center w-full ml-4 my-2">
                    <div><p class="uppercase font-semibold text-lg text-blue-dark underline">Invoices</p></div>
                  Payments
                  </div>
                  @include('agent.invoice.invoices')
                </div>
              </div>
            </div>
         </div>
    </div>-->
@endsection
@section('scripts')
<script>
 $('#invoices').DataTable( {
      dom: 'Bfrtip',
  buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdfHtml5'
  ]});
</script>
@endsection
