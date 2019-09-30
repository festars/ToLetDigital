@extends('layouts.main2')

@section("page-title", "Tasks")

@section('content')


<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Tasks</h3>
                </div>
                <div class="col text-right">
                  <new-ownertask :rentals="{{ json_encode(Auth::user()->rentals) }}" ></new-ownertask>
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              
                                <table class="table" id="example1">
                    <thead class="bg-primary">
                      
                      <th>Task</th>
                      <th>Unit Number</th>
                      <th>Status</th>
                      <th>Due Date</th>
                      <th>Actions</th>
                    </thead>
                   @foreach($tasks as $task)
                     <tr>
                      <td>{{$task->details}}</td>
                      <td>{{$task->property}}</td>
                      <td>{{$task->status}}</td>
                      <td>{{ \Carbon\Carbon::parse($task->duedate)->format('d/m/Y')}}</td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          
                          <!--<a href="{{ url('/tenant/tasks',['id' =>$task->id ])}}" class="btn btn-primary">View</a>-->
                         <!--<edit-ownertask :task="{{$task}}" :rentals="{{ json_encode(Auth::user()->rentals->load('rentable')) }}"></edit-ownertask>-->
                         <delete-item url="/owner/tasks/{{$task->id}}"></delete-item>
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