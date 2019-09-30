@extends('layouts.main2')

@section("page-title", "Profile")

@section('content')


<div class="row">
  @if ($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
 
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Bulk SMS</h3>
                </div>
                <div class="col text-right">
               
    
                </div>
              </div>
            </div>
            
            <div class="card-body">
              
               <form method="post" action="/agent/sendsms" enctype= "multipart/form-data">
                @csrf
                <h6 class="heading-small text-muted mb-4">Bulk SMS</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>Enter Text Message</label>
                    <textarea rows="4" class="form-control form-control-alternative" placeholder="Hello" name="message" required=""></textarea>
                  </div>
                </div>
                                
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>Enter Phone Numbers</label>
                    <textarea rows="4" class="form-control form-control-alternative" placeholder="+25470000000,+2547220000000" name="phones"></textarea>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>Attach Phone Number</label>
                    <input class="form-control form-control-alternative" type="file" name="phonefiles"/>
                  </div>
                </div>
                <button class="btn btn-success" type="submit">Send</button>
              </form>
              
            </div>
            
          </div>

          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Bulk Email</h3>
                </div>
                <div class="col text-right">
               
    
                </div>
              </div>
            </div>
            
            <div class="card-body">
              
               <form method="post" action="/agent/sendemail" enctype= "multipart/form-data">
                @csrf
                <h6 class="heading-small text-muted mb-4">Bulk Email</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label> Email subject</label>
                    <input class="form-control form-control-alternative" placeholder="Email subject" name="subject" required=""/>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label> Email Body</label>
                    <textarea rows="4" class="form-control form-control-alternative" placeholder="Hello" name="message" required=""></textarea>
                  </div>
                </div>
                                
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>Select Audience</label>
                    <select class="form-control form-control-alternative" name="audience">
                      <option >My Owners</option>
                    </select>
                  </div>
                </div>

                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>Attach Emails</label>
                    <input class="form-control form-control-alternative" type="text" name="emails"/>
                  </div>
                </div>
                <button class="btn btn-success" type="submit">Send</button>
              </form>
              
            </div>
            
          </div>
        </div>
        
        
          
      </div>

@endsection