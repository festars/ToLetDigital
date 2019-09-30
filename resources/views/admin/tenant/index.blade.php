@extends('layouts.main2')

@section("page-title", "Tenants")

@section('content')


<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Tenants</h3>
                </div>
                <div class="col text-right">
                  
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              
              <table id="example1" class="w-full">
                <thead class="w-full">
                  <tr class="w-full content-center bg-tolet-blue">
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">A/Email</th>
                    <th scope="col">A/Phone</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($tenants as $tenant)
                      @include('admin.tenant.table')
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
