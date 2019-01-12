@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center shandow-md my-4">
          <div class="px-2">
            <p><h3>Your Rentals Summary</h3></p>
          </div>

          <div>

           </div>
        </div>
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <table id="example1" class="w-full table">
                <thead class="w-full bg-primary">
                  <tr class="">
                    <th scope="col">Unit Name</th>
                    <th scope="col">Listing</th>
                    <th scope="col">Agent</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Total</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($rentals as $rental)

                    <tr class="w-full" >
                        <td>
                       {{ $rental->rentable->name }}
                        </td>
                      <td>{{ $rental->rentable->listing->name }}</td>
                      <td>{{ $rental->agent->name or '' }}</td>
                      <td>{{ $rental->rentable->listing->owner->name or '' }}</td>
                      <td>{{ $rental->rentable->total }}</td>
                      <td> 
                        <a 
                          href="{{ route('tenant.room',['id' =>$rental->rentable->id ])}}" 
                          class="no-underline px-2 py-1 border-2 border-transparent hover:border-grey-lighter text-lg text-white font-bold bg-indigo rounded">
                          view
                        </a>
                      </td>
                    </tr>

                    @endforeach
                </tbody>
              </table>
            </div>
         </div>
    </div>
@endsection
@section('scripts')
<script>
  nicetable('#example1');
</script>
@endsection
