@extends('layouts.main2')

@section("page-title", "Profile")

@section('content')


<div class="row">
        <div class="col-sm-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">My Account</h3>
                </div>
                <div class="col text-right">
                  
                  <a href="#!" class="btn btn-sm btn-primary">Edit</a>
                </div>
              </div>
            </div>
            
            <div class="card-body">
              
               <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="lucky.jesse">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="Lucky">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="Jesse">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="New York">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>About Me</label>
                    <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ..."></textarea>
                  </div>
                </div>
              </form>
              
            </div>
            
          </div>
        </div>
        
        <div class="col-sm-4">
          <div class="card card-profile">
            
            @if(!is_null($user->profilepic))
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="{{$user->profilepic }}" height="150" width="150"  class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            @endif
            
            <div class="card-body" style="margin-top: 110px;">
              
              @if(is_null($user->profilepic))
                    <form method="post" action="{{Request::route()->getPrefix().'/profile'}}" enctype="multipart/form-data">
                      @csrf
                      <label for="">Upload Profile Picture</label>
                      <input type="file" name="profilepic"/>
                      <button class="btn btn-success">Upload Picture</button>
                    </form>
              @endif
              
              
              <div class="text-center">
                <h3>
                  {{$user->name}}
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Nairobi, Kenya <!--{{$user->country}}-->
                </div>
                
                <hr class="my-4">
                
                <div class="text-left">
                  <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Phone
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>{{$user->phone}}
                </div>
                
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Email
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>{{$user->email}}
                </div>
                </div>
                
                
              </div>
              
              
            </div> 
            
            </div>
        
      </div>

@endsection