@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <div class="flex items-center">
                <div class="left-table w-full my-4 mx-4">
                  <div class="container mx-auto flex justify-between items-center w-full my-2">
                    <div><p class="uppercase font-semibold text-lg text-blue-dark underline">Tasks</p></div>
                    <div><new-task :rentals="{{ json_encode(Auth::user()->rentals->load('rentable')) }}" ></new-task></div>
                  </div>
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
                         <edit-task :task="{{$task}}" :rentals="{{ json_encode(Auth::user()->rentals->load('rentable')) }}"></edit-task>
                         <delete-item url="/tenant/tasks/{{$task->id}}"></delete-item>
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
  nicetable('#example1');
</script>
@endsection