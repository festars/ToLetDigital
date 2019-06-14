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
                <h5 class="card-header">Expense</h5>
                <div class="card-body">
                  <h5 class="card-title">{{$expense->details}}</h5>
                  <p class="card-text">{{$expense->frequency}}</p>
                  <p class="card-text">{{$expense->amount}}</p>
                  <p class="card-text">{{$expense->payment_method}}</p>
                  <p class="card-text">{{$expense->category}}</p>
                  <p class="card-text">{{$expense->duedate}}</p>
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
