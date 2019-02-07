@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center shandow-md my-4">
          <div class="px-2">
            <p><h3>Property maintenances</h3></p>
          </div>
             <div>
            <new-maintenance :rentals="{{ json_encode(Auth::user()->listings) }}"></new-maintenance>
            
           </div>
        </div>
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <table id="example1" class="w-full">
                <thead class="w-full">
                  <tr class="w-full content-center bg-tolet-blue">
                    <th scope="col">Type</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Cause</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($maintenances as $maintenance)
                    <tr class="w-full">
                      <td>{{ $maintenance->maintenancetype }}</td>
                      <td>{{ $maintenance->duedate }}</td>
                      <td>{{ $maintenance->cost }}</td>
                      <td>{{ $maintenance->notes }}</td>
                      <td>{{ $maintenance->cause }}</td>
                      <td>
                       
                         <div class="flex">
                           
                            <edit-maintenance :rentals="{{ json_encode(Auth::user()->listings) }}" :item="{{$maintenance}}"></edit-maintenance>
                            <delete-item url="/agent/maintenance/{{ $maintenance->id}}" ></delete-item>
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
