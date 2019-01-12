@extends('layouts.main')
@section('content')
    <div class="text-black flex flex-col mx-4">
        <div class="flex justify-between items-center shandow-md my-4">
          <div class="px-2">
            <p><h3>Properties</h3></p>
          </div>
             <div>
            <new-listing :owners="{{ json_encode($owners) }}" :ptypes="{{ json_encode($ptypes) }}"></new-listing>
           </div>
        </div>
         <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <table id="example1" class="w-full">
                <thead class="w-full content-center text-tolet-blue bg-white uppercase">
                  <tr class="w-full content-center">
                    <th scope="col">Name</th>
                    <th scope="col">Property Type</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Tenants</th>
                     <th scope="col">Units</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($listings as $listing)
                    <tr class="w-full">
                      <td>{{ $listing->name or '' }}</td>
                      <td>{{ $listing->ptype->name or '' }}</td>
                      <td>{{ $listing->owner->name }}</td>
                      <td>{{ $listing->total_tenants }}</td>
                      <td>{{ $listing->total_units }}</td>
                      <td>
                          <div class="flex items-center justify-between">
                            <edit-listing :item="{{$listing}}" :owners="{{$owners}}" :ptypes="{{$ptypes}}"></edit-listing>
                            <delete-item url="/agent/listing/{{$listing->id}}"></delete-item>
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

