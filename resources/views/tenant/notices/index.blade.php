@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <div class="flex items-center">
                <div class="left-table w-full my-4 mx-4">
                  <div class="container mx-auto flex justify-between items-center w-full my-2">
                    <div><p class="uppercase font-semibold text-lg text-blue-dark underline">Notice</p></div>
                    <div><new-complain :rentals="{{ json_encode(Auth::user()->rentals->load('rentable')) }}"></new-complain></div>
                  </div>
                 
                    <table class="table w-full" id="example1">
                          <thead class="bg-primary">
                            <tr>
                             <th>Addresed To My</th>
                             <th>Addresed To</th>
                             <th>Move Date</th>
                             <th>Reason</th>
                             <th>Comment</th>
                             <th>Action</th>
                            </tr>
                        </thead>
                        @foreach($notices as $notice)
                        <tr>
                            <td>  {{ str_replace("App\\","",$notice->addressable_type)}}</td>
                            <td> {{ $notice->addressable->name }}</td>
                            <td> {{ $notice->move_date }}</td>
                            <td> {{ $notice->reason }}</td>
                            <td> {{ $notice->comment }}</td>
                            <td>
                                <delete-item url="/tenant/notices/{{$notice->id}}"></delete-item>
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