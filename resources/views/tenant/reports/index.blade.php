@extends('layouts.main2')

@section("page-title", "Reports")


@section('content')
<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Reports</h3>
                </div>
                <div class="col text-right">
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              
              <ul class="list-group list-group-flush">
                  <li class="list-group-item">Name : {{$tenant->name}}</li>
                  <li class="list-group-item">Phone : {{$tenant->phone}}</li>
                  <li class="list-group-item">Email : {{$tenant->email}}</li>
                  <li class="list-group-item">Country : {{$tenant->country}}</li>
              </ul>

              </div>
            
            </div>
        </div>
        <div class="col-xl-12">
        <div class="card" id="container" style="width:100%; height:400px;"></div>
        </div>
      </div>


@endsection
@section('scripts')
<script type="text/javascript" >
  document.addEventListener('DOMContentLoaded', function () {
    var tenant={!! json_encode($tenant->toArray(), JSON_HEX_TAG) !!};
    $.each(tenant, function( k, v ) {
      if(!k.endsWith("_count")){
        delete tenant[k];
      }

});
    var myChart = Highcharts.chart('container', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'My Stats'
        },
        xAxis: {
            categories: ['Tasks', 'Complains', 'Notices']
        },
        yAxis: {
            title: {
                text: 'No.'
            }
        },
        series: [{
            name: '{{ (Auth::user()->name) }}',
            data:[tenant.tasks_count,tenant.complains_count,tenant.notices_count] 
        }]
    });
});
</script>
@endsection
