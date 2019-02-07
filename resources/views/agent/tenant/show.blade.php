@extends('layouts.main')
@section('content')

    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <div class="flex items-center">
                <div class="left-table w-full my-4 mx-4">
                  <div class="container mx-auto flex justify-between items-center w-full my-2">
                    <div><p class="uppercase font-semibold text-lg text-blue-dark underline">Profile</p></div>
                   
                  </div>
                  <div class="row ">
                     <div class="card text-center col-md-12">
                          
                          <div class="card-body">
                            @if(!is_null($tenant->profilepic))
                                  <img src="{{$tenant->profilepic }}" height="150" width="150" class="rounded-circle">
                            @else
                                  <form method="post" action="{{Request::route()->getPrefix().'/tenant/profile/'.$tenant->id}}" enctype="multipart/form-data">
                                    @csrf
                                    <label for="">Upload Profile Picture</label>
                                    <input type="file" name="profilepic"/>
                                    <button class="btn btn-success">Upload Picture</button>
                                  </form>
                            @endif
                          </div>
                      
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
            </div>
         </div>
    </div>
@endsection