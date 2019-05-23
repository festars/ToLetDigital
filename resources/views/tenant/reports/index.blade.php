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
        
      </div>


@endsection