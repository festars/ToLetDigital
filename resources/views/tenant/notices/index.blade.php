@extends('layouts.main2')

@section("page-title", "Notice")

@section('content')


<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Notice</h3>
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
              
                <table class="table w-full" id="example1">
                          <thead class="bg-primary">
                            <tr>
                             <th>Addresed To My</th>
                             <th>Addresed To</th>
                             <th>Move Date</th>
                             <th>Reason</th>
                             <th>Comment</th>
                             <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($notices as $notice)
                        <tr>
                            <td>  {{ str_replace("App\\","",$notice->addressable_type)}}</td>
                            <td> {{ $notice->addressable->name }}</td>
                            <td> {{ $notice->move_date }}</td>
                            <td> {{ $notice->reason }}</td>
                            <td> {{ $notice->comment }}</td>
                            <td>
                                <delete-item url="/tenant/notices/{{$notice->id}}"></delete-item>
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