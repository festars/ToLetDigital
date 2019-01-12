@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center shandow-md my-4">
          <div class="px-2">
            <p><h3>Unit Types.</h3></p>
          </div>
             <div>
           <new-unit-type></new-unit-type>
           </div>
        </div>
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <table id="example1" class="w-full">
                <thead class="w-full">
                  <tr class="w-full content-center text-tolet-blue bg-white uppercase">
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Descriptions</th>
                     <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($units as $unit)
                    <tr class="w-full">
                      <td>{{ $unit->id }}</td>
                      <td>{{ $unit->name }}</td>
                      <td>{{ $unit->description }}</td>
                      <td class="flex justify-around">
                        <span><edit-unit-type item="{{ json_encode($unit) }}"></edit-unit-type></span>
                        <span>Delete</span>
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
