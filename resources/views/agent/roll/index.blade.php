@extends('layouts.main')
@section('content')
    <div class="flex flex-col m-4">
        <div class="flex justify-between items-center shandow-md my-4">
          <div>
            <p><h3>Rent Roll</h3></p>
            
            
          </div>
          
          <div>
            <new-invoice :properties="{{$properties}}"></new-invoice>
           </div>
        </div>
        <div class="flex justify-between items-center my-4">
            
              <table id="example1" class="w-full">
                
                <thead class="w-full">
                  <tr class="w-full content-center text-tolet-blue bg-white uppercase">
                    <th scope="col">Property</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tenants</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                      @include('agent.roll.roll')
                    @endforeach
                </tbody>
                 <tfoot>
            <tr>
                <th scope="col">Property</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tenants</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
            </tr>
        </tfoot>
              </table>
            </div>
         </div>
    </div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $('#example1').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                 console.log(this);
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                             
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
           
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
  
</script>
@endsection
