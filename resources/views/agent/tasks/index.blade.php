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
                  <new-agenttask :rentals="{{ json_encode(Auth::user()->rentals->load('rentable')) }}" ></new-agenttask>
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
                      <th>Priority Level</th>
                      <th>Due Date</th>
                      <th>Actions</th>
                    </thead>
                   @foreach($tasks as $task)
                     <tr>
                      <td>{{$task->details}}</td>
                      <td>{{$task->property}}</td>
                      <td>{{$task->priortylevel}}</td>
                      <td>{{ \Carbon\Carbon::parse($task->duedate)->format('d/m/Y')}}</td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          
                          <!--<a href="{{ url('/tenant/tasks',['id' =>$task->id ])}}" class="btn btn-primary">View</a>-->
                         <edit-agenttask :task="{{$task}}" :rentals="{{ json_encode(Auth::user()->rentals->load('rentable')) }}"></edit-agenttask>
                         <delete-item url="/agent/tasks/{{$task->id}}"></delete-item>
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



    <!--<div class="flex flex-col m-4">
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <div class="flex items-center">
                <div class="left-table w-full my-4 mx-4">
                  <div class="container mx-auto flex justify-between items-center w-full my-2">
                    <div><p class="uppercase font-semibold text-lg text-blue-dark underline">Tasks</p></div>
                    <div><new-agenttask :rentals="{{ json_encode(Auth::user()->rentals->load('rentable')) }}" ></new-agenttask></div>
                  </div>
                  <table class="table" id="example1">
                    <thead class="bg-primary">
                      
                      <th>Task</th>
                      <th>Unit Number</th>
                      <th>Priority Level</th>
                      <th>Due Date</th>
                      <th>Actions</th>
                    </thead>
                   @foreach($tasks as $task)
                     <tr>
                      <td>{{$task->details}}</td>
                      <td>{{$task->property}}</td>
                      <td>{{$task->priortylevel}}</td>
                      <td>{{ \Carbon\Carbon::parse($task->duedate)->format('d/m/Y')}}</td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          

                         <edit-agenttask :task="{{$task}}" :rentals="{{ json_encode(Auth::user()->rentals->load('rentable')) }}"></edit-agenttask>
                         <delete-item url="/agent/tasks/{{$task->id}}"></delete-item>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                  </table>
                  
                </div>
              </div>
            </div>
         </div>
    </div>-->
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