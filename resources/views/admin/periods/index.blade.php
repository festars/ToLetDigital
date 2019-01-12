@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center shandow-md my-4">
          <div class="px-2">
            <p><h3>Periods</h3></p>
          </div>
             <div>
           <new-period></new-period>
           </div>
        </div>
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <table id="example1" class="w-full">
                <thead class="w-full">
                  <tr class="w-full content-center text-tolet-blue bg-white uppercase">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($terms as $period)
                    <tr class="w-full">
                      <td>{{ $period->id }}</td>
                      <td>{{ $period->name }}</td>
                      <td>Edit/Delete/view</td>
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
