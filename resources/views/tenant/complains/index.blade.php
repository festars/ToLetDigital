@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <div class="flex items-center">
                <div class="left-table w-full my-4 mx-4">
                  <div class="container mx-auto flex justify-between items-center w-full my-2">
                    <div><p class="uppercase font-semibold text-lg text-blue-dark underline">Complains</p></div>
                    <div><new-complain :rentals="{{ json_encode(Auth::user()->rentals->load('rentable')) }}"></new-complain></div>
                  </div>
                  
                   <table class="table" id="example1">
                    <thead class="bg-primary">
                      <tr>
                        <th>Addresed to My</th>
                        <th>Addresed To </th>
                        <th>Complain</th>
                        <th>Due On</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                     @foreach($complains as $complain)
                    <tr>
                      <td>{{ str_replace("App\\","",$complain->addressable_type) }}</td>
                      <td>{{ $complain->addressable->name }}</td>
                      <td>{{ $complain->complain }}</td>
                      <td>{{ $complain->duedate }}</td>
                      <td> 
                        <delete-item url="/tenant/complains/{{$complain->id}}"></delete-item>
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