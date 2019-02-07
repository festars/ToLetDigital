@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center shandow-md my-4">
          <div class="px-2">
            <p><h3>Tenants</h3></p>
          </div>
          <div class="px-2">

          </div>
          <div>
            <new-tenant :rentals="{{ json_encode(Auth::user()->listings) }}" ></new-tenant>
           </div>
        </div>
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <table id="example1" class="w-full">
                <thead class="w-full">
                  <tr class="w-full content-center bg-tolet-blue">
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">A/Email</th>
                    <th scope="col">A/Phone</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($rentals as $tenant)
                      @include('agent.tenant.table')
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
