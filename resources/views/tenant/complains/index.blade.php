@extends('layouts.main2')

@section("page-title", "Complains")

@section('content')


<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Complains</h3>
                </div>
                <div class="col text-right">
                  <new-complain :rentals="{{ json_encode(Auth::user()->rentals->load('rentable')) }}"></new-complain>
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              
                                <table class="table" id="example1">
                    <thead class="bg-primary">
                      <tr>
                        <th>Addresed to My</th>
                        <th>Addresed To </th>
                        <th>Complain</th>
                        <th>Due On</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                     @foreach($complains as $complain)
                    <tr>
                      <td>{{ str_replace("App\\","",$complain->addressable_type) }}</td>
                      <td>{{ $complain->addressable->name }}</td>
                      <td>{{ $complain->complain }}</td>
                      <td>{{ $complain->duedate }}</td>
                      <td> 
                        <delete-item url="/tenant/complains/{{$complain->id}}"></delete-item>
                      </td>
                    </tr>
                     @endforeach
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