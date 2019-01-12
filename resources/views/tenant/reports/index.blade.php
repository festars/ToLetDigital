@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <div class="flex items-center">
                <div class="left-table w-full my-4 mx-4">
                  <div class="container mx-auto flex justify-between items-center w-full my-2">
                    <div><p class="uppercase font-semibold text-lg text-blue-dark underline">Reports</p></div>
                   
                  </div>
                  <div class="row ">
                     <div class="card">
                          <div class="card-header">
                            My Details
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