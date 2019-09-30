@extends('layouts.main2')

@section("page-title", "Room Details")


@section("top-content")

<div class="row">
            <div class="col-md-3">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Unit Name</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $room->name }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-blue text-white rounded-circle shadow">
                        <i class="far fa-building"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Property</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $room->listing->name }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-blue text-white rounded-circle shadow">
                        <i class="far fa-building"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Owner</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $room->listing->owner->name }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-blue text-white rounded-circle shadow">
                        <i class="far fa-building"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>

@endsection


@section('content')

<div class="row">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Tenants Details</h3>
                </div>
                <div class="col text-right">
                  <assign-tenant class="d-inline-block" room="{{ $room->id }}"></assign-tenant>
                  <new-tenant :rentals="{{ json_encode(Auth::user()->listings) }}" class="d-inline-block" room="{{ $room->id }}"></new-tenant>
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                @include('agent.rooms.tenants')
                </div>
                
                </div>
                
                </div>
                </div>
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Escrow Accounts</h3>
                </div>
                <div class="col text-right">
                  <new-account  room="{{ $room->id }}" :properties="{{ json_encode($listing)}}"></new-account>
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                @include('agent.rooms.accounts')
                </div>
                
                </div>
                
                </div>
                </div>
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
                @include('agent.rooms.payments')
                </div>
                
                </div>
                
                </div>
                </div>
</div>

@endsection
@section('scripts')
<script>
  <script>
 $('#payments').DataTable( {
      dom: 'Bfrtip',
  buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdfHtml5'
  ]});
</script>
<script>
 $('#finance').DataTable( {
      dom: 'Bfrtip',
  buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdfHtml5'
  ]});
</script>
<script>
 $('#tenants').DataTable( {
      dom: 'Bfrtip',
  buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdfHtml5'
  ]});
</script>
<!-- nicetable('#tenants');
  /*nicetable('#tenants',{
    "order": [[ 4, "desc" ]]
  });*/
  nicetable('#finance', {
      drawCallback: function () {
      var api = this.api();
      $( api.table().footer() ).html(
        api.column( 3, {page:'current'} ).data().sum()
      );
    }
  });
  nicetable('#payments'); -->

</script>
@endsection