@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center shandow-md my-4">
          <div class="px-2">
            <p><h3>Property Units</h3></p>
          </div>
          <div class="px-2">
            @if($property)
            <p><h3>{{ $property->name }} Units</h3></p>
            @else
            <p><h3>All Units</h3></p>
            @endif
          </div>
          <div>
            <new-room :listings="{{ json_encode($properties) }}" :types="{{ json_encode($types) }}"></new-room>
           </div>
        </div>
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <table id="example1" class="w-full">
                <thead class="w-full">
                  <tr class="w-full content-center bg-tolet-blue">
                    <th scope="col">Unit Name</th>
                    <th scope="col">Size(SQft)</th>
                    <th scope="col">Property</th>
                    <th scope="col">Unit Type</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)

                    <tr class="w-full" >
                      <td>{{ $room->name }}</td>
                      <td>{{ $room->size }}</td>
                      <td>{{ $room->listing->name or '' }}</td>
                      <td>{{ $room->roomType->name or '' }}</td>
                      <td>{{ $room->total }}</td>
                      <td class="">
                        @if($room->tenants->count() > 0 )
                        <span class="bg-green rounded-full uppercase p-2 text-white font-normal"> Occupied </span>
                        @else
                        <span class="bg-orange rounded-full uppercase p-2 text-white font-normal"> Vacant </span>
                        @endif
                      </td>
                      <td>
                        <div class="flex items-center justify-between">
                          <edit-room
                                :listings="{{ json_encode($properties) }}"
                                :types="{{ json_encode($types) }}"
                                :item="{{ json_encode($room) }}"
                                >
                          </edit-room>
                          <a 
                            href="{{ route('room.show',['id' =>$room->id ])}}" 
                            class="no-underline px-2 py-1 border-2 border-transparent hover:border-grey-lighter text-lg text-white font-bold bg-indigo rounded">
                            view
                          </a>
                          <delete-item url="/agent/room/{{$room->id}}"></delete-item>
                        </div>
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
