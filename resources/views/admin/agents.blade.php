@extends('layouts.main2')

@section("page-title", "Agents")

@section('content')

<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Agents</h3>
                </div>
                <div class="col text-right">
                  
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              
                  <table class="table" id="example1">
                    <thead class="bg-primary">
                         
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Approved</th>
                      
                      <th>Actions</th>
                    </thead>
                   @foreach($agents as $agent)
                     <tr>
                      <td>{{$agent->name}}</td>
                      <td>{{$agent->email}}</td>
                      <td>{{$agent->phone}}</td>
                      <td>
                          @if($agent->isApproved == 1)
                              <label class="label label-succuess">Approved</label>
                          @else
                               <label class="label label-danger">Not Approved</label>
                          @endif
                              
                      </td>
                     
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            
                            @if($agent->isApproved == 1)
                              <a href="{{ url('/admin/agent/decline',['id' =>$agent->id ])}}" class="btn btn-danger">Decline</a>
                          @else
                               <a href="{{ url('/admin/agent/aprrove',['id' =>$agent->id ])}}" class="btn btn-primary">Approve</a>
                          @endif
                          
                          @if($agent->suspended == 1)
                              <a href="{{ url('/admin/agent/unsuspend',['id' =>$agent->id ])}}" class="btn btn-primary">Unsuspend</a>
                          @else
                               <a href="{{ url('/admin/agent/suspend',['id' =>$agent->id ])}}" class="btn btn-danger">Suspend</a>
                          @endif
                          
                          
                          
                         
                         
                        </div>
                      </td>
                    </tr>
                  @endforeach
                  </table>
                
                
            </div>
            </div>
            
          </div>
        </div>
      </div>

@endsection
@section('scripts')
<script>
 $('#example1').DataTable( {
      dom: 'Bfrtip',
  buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdfHtml5'
  ]});
</script>
@endsection