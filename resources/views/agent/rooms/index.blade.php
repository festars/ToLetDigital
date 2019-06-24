@extends('layouts.main2')

@section("page-title", "Property Units")

@section('content')

<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Property Units  
                  @if($property)
                   - {{ $property->name }} Units
                  @else
                   - All Units
                  @endif</h3>
                </div>
                <div class="col text-right">
                  <new-room :listings="{{ json_encode($properties) }}" :types="{{ json_encode($types) }}"></new-room>
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              
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
        </div>
      </div>

@endsection
@section('scripts')
<script>
  nicetable('#example1');
</script>
@endsection
