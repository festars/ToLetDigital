@extends('layouts.main2')


@section("style")
<style type="text/css">
    .card-body .h2 {
        font-size: xx-large;
    }
</style>

@endsection


@section("top-content")

<div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Properties</h5>
                      <span class="h2 font-weight-bold mb-0">{{$data->total_listings}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-blue text-white rounded-circle shadow">
                        <i class="far fa-building"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Units</h5>
                      <span class="h2 font-weight-bold mb-0">{{$data->total_units}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-puzzle-piece"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Tenants</h5>
                      <span class="h2 font-weight-bold mb-0">{{$data->total_tenants}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-default text-white rounded-circle shadow">
                        <i class="fas fa-user-friends"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Complains</h5>
                      <span class="h2 font-weight-bold mb-0">{{$data->complains_count}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-exclamation"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Unpaid Invoices</h5>
                      <span class="h2 font-weight-bold mb-0">{{$data->unpaid_invoices}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-file-invoice"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Paid Invoices</h5>
                      <span class="h2 font-weight-bold mb-0">{{$data->paid_invoices}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                        <i class="fas fa-file-invoice-dollar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last week</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Rent Expected</h5>
                      <span class="h2 font-weight-bold mb-0">{{$data->rent_total}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-hand-holding-usd"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since yesterday</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Tasks</h5>
                      <span class="h2 font-weight-bold mb-0">0</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-tasks"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
          </div>

@endsection


@section("page-title", "Dashboard")

@section('content')

<div class="row">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Page visits</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Page name</th>
                    <th scope="col">Visitors</th>
                    <th scope="col">Unique users</th>
                    <th scope="col">Bounce rate</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      /argon/
                    </th>
                    <td>
                      4,569
                    </td>
                    <td>
                      340
                    </td>
                    <td>
                      <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /argon/index.html
                    </th>
                    <td>
                      3,985
                    </td>
                    <td>
                      319
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /argon/charts.html
                    </th>
                    <td>
                      3,513
                    </td>
                    <td>
                      294
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /argon/tables.html
                    </th>
                    <td>
                      2,050
                    </td>
                    <td>
                      147
                    </td>
                    <td>
                      <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      /argon/profile.html
                    </th>
                    <td>
                      1,795
                    </td>
                    <td>
                      190
                    </td>
                    <td>
                      <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Social traffic</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Referral</th>
                    <th scope="col">Visitors</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      Facebook
                    </th>
                    <td>
                      1,480
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">60%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Facebook
                    </th>
                    <td>
                      5,480
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">70%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Google
                    </th>
                    <td>
                      4,807
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">80%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      Instagram
                    </th>
                    <td>
                      3,678
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">75%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                      twitter
                    </th>
                    <td>
                      2,645
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="mr-2">30%</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

<!--<div class="bg-white h-full">
  
    <div>
          <h3>Dashboard</h3>
        <div class="flex justify-between mt-4">
            <div class="h-48 w-1/3 mx-4 bg-white rounded border-b-2 border-r-2 border-l-2 shadow-md">
                <div class="flex flex-col justify-center items-center border-t-8 border-blue rounded">
                    <div class="flex justify-center items-center py-2 px-2 my-4">
                        <h4 class="text-bold text-5xl tracking-wide text-tolet-blue">{{$data->total_listings}}</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <a class="text-lg uppercase text-grey tracking-wide" href="/agent/listing"><h4 >Properties</h4></a>
                    </div>
                </div>
            </div>
            <div class="h-48 w-1/3 mx-4 bg-white rounded border-b-2 border-r-2 border-l-2 shadow-md">
                <div class="flex flex-col justify-center items-center border-t-8 border-red rounded">
                    <div class="flex justify-center items-center py-2 px-2 my-4">
                        <h4 class="text-bold text-5xl tracking-wide text-tolet-blue">{{$data->total_units}}</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <a class="text-lg uppercase text-grey tracking-wide" href="/agent/room"><h4>Units</h4></a>
                    </div>
                </div>
            </div>
            <div class="h-48 w-1/3 mx-4 bg-white rounded border-b-2 border-r-2 border-l-2 shadow-md">
                <div class="flex flex-col justify-center items-center border-t-8 border-indigo rounded">
                    <div class="flex justify-center items-center py-2 px-2 my-4">
                        <h4 class="text-bold text-5xl tracking-wide text-tolet-blue">{{$data->total_tenants}}</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <a class="text-lg uppercase text-grey tracking-wide" href="/agent/tenant"><h4 >Tenants</h4></a>
                    </div>
                </div>
            </div>

            <div class="h-48 w-1/3 mx-4 bg-white rounded border-b-2 border-r-2 border-l-2 shadow-md">
                <div class="flex flex-col justify-center items-center border-t-8 border-green rounded">
                    <div class="flex justify-center items-center py-2 px-2 my-4">
                        <h4 class="text-bold text-5xl tracking-wide text-tolet-blue">{{$data->complains_count}}</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <a class="text-lg uppercase text-grey tracking-wide" href="/agent/complains"><h4 >Complains</h4></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-white h-full">
    <div>
        <div class="flex justify-between mt-4">
            <div class="h-48 w-1/3 mx-4 bg-white rounded border-b-2 border-r-2 border-l-2 shadow-md">
                <div class="flex flex-col justify-center items-center border-t-8 border-blue rounded">
                    <div class="flex justify-center items-center py-2 px-2 my-4">
                        <h4 class="text-bold text-5xl tracking-wide text-tolet-blue">{{$data->unpaid_invoices}}</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <a class="text-lg uppercase text-grey tracking-wide" href="/agent/invoice?type=unpaid"><h4 >Unpaid Invoces</h4></a>
                    </div>
                </div>
            </div>
            <div class="h-48 w-1/3 mx-4 bg-white rounded border-b-2 border-r-2 border-l-2 shadow-md">
                <div class="flex flex-col justify-center items-center border-t-8 border-red rounded">
                    <div class="flex justify-center items-center py-2 px-2 my-4">
                        <h4 class="text-bold text-5xl tracking-wide text-tolet-blue">{{$data->paid_invoices}}</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <a class="text-lg uppercase text-grey tracking-wide" href="/agent/invoice?type=paid"><h4>Paid Invoices</h4></a>
                    </div>
                </div>
            </div>
            <div class="h-48 w-1/3 mx-4 bg-white rounded border-b-2 border-r-2 border-l-2 shadow-md">
                <div class="flex flex-col justify-center items-center border-t-8 border-indigo rounded">
                    <div class="flex justify-center items-center py-2 px-2 my-4">
                        <h4 class="text-bold text-5xl tracking-wide text-tolet-blue">{{$data->rent_total}}</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <a class="text-lg uppercase text-grey tracking-wide" href="/agent/rent"><h4 >Rent Expected</h4></a>
                    </div>
                </div>
            </div>

            <div class="h-48 w-1/3 mx-4 bg-white rounded border-b-2 border-r-2 border-l-2 shadow-md">
                <div class="flex flex-col justify-center items-center border-t-8 border-green rounded">
                    <div class="flex justify-center items-center py-2 px-2 my-4">
                        <h4 class="text-bold text-5xl tracking-wide text-tolet-blue">0</h4>
                    </div>
                    <div class="flex justify-center items-center">
                        <a class="text-lg uppercase text-grey tracking-wide" href="/agent/tasks"><h4 >Tasks</h4></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
