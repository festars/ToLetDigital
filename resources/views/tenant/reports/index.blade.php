@extends('layouts.main2')

@section("page-title", "Reports")


@section('content')
<div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Details</h3>
                </div>
                <div class="col text-right">
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              
              <div class="form-group">
                <label for="" class="text-muted h5 mb-0">Name</label>
                <input type="text" readonly class="form-control-plaintext" value="{{$tenant->name}}">
              </div>
              
              <div class="form-group">
                <label for="" class="text-muted h5 mb-0">Phone</label>
                <input type="text" readonly class="form-control-plaintext" value="{{$tenant->phone}}">
              </div>
              
              <div class="form-group">
                <label for="" class="text-muted h5 mb-0">Email</label>
                <input type="text" readonly class="form-control-plaintext" value="{{$tenant->email}}">
              </div>
              
              <div class="form-group">
                <label for="" class="text-muted h5 mb-0">Country</label>
                <input type="text" readonly class="form-control-plaintext" value="{{$tenant->country}}">
              </div>

              </div>
            
            </div>
        </div>
        <div class="col-md-8">
          
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
              
              <div id="container"></div>

              </div>
            
            </div>
          
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
