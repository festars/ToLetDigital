@extends('layouts.main2')

@section("page-title", "Expenses")

@section('content')

<div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Expenses</h3>
                </div>
                <div class="col text-right">
                    <!--<new-expense :rentals="{{ json_encode(Auth::user()->listings) }}" ></new-expense>-->
                  <!--<a href="#!" class="btn btn-sm btn-primary">See all</a>-->
                </div>
              </div>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
              <!-- Projects table -->
              

                  <table class="table" id="example1">
                    <thead class="bg-tolet-blue">
                       <tr>
                      <th>Expense</th>
                      <th>Property</th>
                      <th>Frequency</th>
                      <th>Amount</th>
                      <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                   @foreach($expenses as $expense)
                     <tr>
                      <td>{{$expense->details}}</td>
                      <td>{{$expense->listing["name"]}}</td>
                      <td>{{$expense->frequency}}</td>
                      <td>{{$expense->amount}}</td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          
                          <a href="{{ url('/vendor/expenses',['id' =>$expense->id ])}}" class="btn btn-primary">View</a>
                         <!--<edit-expense :expense="{{$expense}}" :rentals="{{ json_encode(Auth::user()->listings) }}"></edit-expense>-->
                         <delete-item url="/vendor/expense/{{$expense->id}}"></delete-item>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                   <tfoot>
                      <tr>
                      <th>Expense</th>
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