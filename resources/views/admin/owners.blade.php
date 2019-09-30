@extends('layouts.main2')

@section("page-title", "Owners")

@section('content')

<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Owners</h3>
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
                   @foreach($owners as $owner)
                     <tr>
                      <td>{{$owner->name}}</td>
                      <td>{{$owner->email}}</td>
                      <td>{{$owner->phone}}</td>
                      <td>
                          @if($owner->isApproved == 1)
                              <label class="label label-succuess">Approved</label>
                          @else
                               <label class="label label-danger">Not Approved</label>
                          @endif
                              
                      </td>
                     
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            
                            @if($owner->isApproved == 1)
                              <a href="{{ url('/admin/owner/decline',['id' =>$owner->id ])}}" class="btn btn-danger">Decline</a>
                          @else
                               <a href="{{ url('/admin/owner/aprrove',['id' =>$owner->id ])}}" class="btn btn-primary">Approve</a>
                          @endif
                          
                          @if($owner->suspended == 1)
                              <a href="{{ url('/admin/owner/unsuspend',['id' =>$owner->id ])}}" class="btn btn-primary">Unsuspend</a>
                          @else
                               <a href="{{ url('/admin/owner/suspend',['id' =>$owner->id ])}}" class="btn btn-danger">Suspend</a>
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