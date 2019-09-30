@extends('layouts.main2')

@section("page-title", "Periods")

@section('content')


<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Unit type</h3>
                </div>
                <div class="col text-right">
                  <new-period></new-period>
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              <table id="example1" class="w-full">
                <thead class="w-full">
                  <tr class="w-full content-center text-tolet-blue bg-white uppercase">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($terms as $period)
                    <tr class="w-full">
                      <td>{{ $period->id }}</td>
                      <td>{{ $period->name }}</td>
                      <td>Edit/Delete/view</td>
                    </tr>
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
