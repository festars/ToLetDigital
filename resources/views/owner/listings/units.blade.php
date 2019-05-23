@extends('layouts.main2')

@section("page-title", "Units")

@section('content')

<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Units</h3>
                </div>
                
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              

                  <table class="table" id="example1">
                    <thead class="bg-tolet-blue">
                       <tr>
                      <th>Name</th>
                      <th>Building</th>
                      <th>Total Tenants</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($units as $unit)
                     <tr>
                      <td>{{$unit->name}}</td>
                      <td>{{$unit->listing->name}}</td>
                      <td>{{$unit->total_tenants}}</td>
                      
                     
                    </tr>
                  @endforeach
                  </tbody>
                   <tfoot>
                      <tr>
                      <th>listing</th>
                      <th>Property</th>
                      <th>Frequency</th>
                      <th>Amount</th>
                     <th></th>
                      </tr>
                  </tfoot>
                  </table>


              
            </div>
            </div>
            
          </div>
        </div>
      </div>




 <!--   <div class="flex flex-col m-4">
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <div class="flex items-center">
                <div class="left-table w-full my-4 mx-4">
                  <div class="container mx-auto flex justify-between items-center w-full my-2">
                    <div><p class="uppercase font-semibold text-lg text-blue-dark underline">listings</p></div>
                    <div><new-listing :rentals="{{ json_encode(Auth::user()->listings) }}" ></new-listing></div>
                  </div>
                  <table class="table" id="example1">
                    <thead class="bg-tolet-blue">
                       <tr>
                      <th>listing</th>
                      <th>Property</th>
                      <th>Frequency</th>
                      <th>Amount</th>
                      <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($units as $unit)
                     <tr>
                      <td>{{$unit->details}}</td>
                      <td>{{$unit->listing["name"]}}</td>
                      <td>{{$unit->frequency}}</td>
                      <td>{{$unit->amount}}</td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          

                         <edit-listing :listing="{{$unit}}" :rentals="{{ json_encode(Auth::user()->listings) }}"></edit-listing>
                         <delete-item url="/agent/listing/{{$unit->id}}"></delete-item>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                   <tfoot>
                      <tr>
                      <th>listing</th>
                      <th>Property</th>
                      <th>Frequency</th>
                      <th>Amount</th>
                     <th></th>
                      </tr>
                  </tfoot>
                  </table>
                  
                </div>
              </div>
            </div>
         </div>
    </div>-->
@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#example1').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
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