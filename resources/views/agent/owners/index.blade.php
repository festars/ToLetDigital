@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center shandow-md my-4">
          <div class="px-2">
            <p><h3>Property Owners</h3></p>
          </div>
             <div>
            <new-owner></new-owner>
            
           </div>
        </div>
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <table id="example1" class="w-full">
                <thead class="w-full">
                  <tr class="w-full content-center bg-tolet-blue">
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Properties</th>
                    <th scope="col">Tenants</th>
                     <th scope="col">Units</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($owners as $owner)
                    <tr class="w-full">
                      <td>{{ $owner->name }}</td>
                      <td>{{ $owner->email }}</td>
                      <td>{{ $owner->total_listings }}</td>
                      <td>{{ $owner->total_tenants }}</td>
                      <td>{{ $owner->total_units }}</td>
                      <td>
                       
                          
                        
                     <div class="flex">
                       
                        <edit-owner :item="{{$owner}}"></edit-owner>
                        <delete-item url="/agent/owner/{{ $owner->id}}" ></delete-item>
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
