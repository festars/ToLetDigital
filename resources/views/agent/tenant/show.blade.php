@extends('layouts.main2')

@section("page-title", "Profile")


@section("content")


<div class="row">
        <div class="col-xl-6 mx-auto">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Profile</h3>
                </div>
                <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Edit</a>
                </div>
              </div>
            </div>
            
            <div class="card-body">
              
              @if(!is_null($tenant->profilepic))
                    <img src="{{$tenant->profilepic }}" height="150" width="150" class="rounded-circle">
              @else
                    <form method="post" class="form" action="{{Request::route()->getPrefix().'/tenant/profile/'.$tenant->id}}" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="">Upload Profile Picture</label>
                        <input class="form-control" type="file" name="profilepic"/>
                      </div>
                      <button class="btn btn-success">Upload Picture</button>
                    </form>
              @endif
              <br> <br>
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