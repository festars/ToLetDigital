@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center shandow-md my-4">
          <div class="px-2">
            <p><h3>{{ $task->detail }}</h3></p>
          </div>
          <div class="px-2">

          </div>
          
        </div>
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <div class="card">
                <h5 class="card-header">My Task</h5>
                <div class="card-body">
                  <h5 class="card-title">{{$task->tasktype}}</h5>
                  <p class="card-text">{{$task->DueDate}}</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
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
