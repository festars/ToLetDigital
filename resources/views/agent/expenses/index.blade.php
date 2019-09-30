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
                    <new-expense :rentals="{{ json_encode(Auth::user()->listings) }}" ></new-expense>
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
                      <th>Status</th>
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
                      @if($expense->approvedon === NULL && $expense->declinedon === NULL)
                      <td><span class = "bg-orange rounded-full uppercase p-2 text-white font-normal">Pending</span></td>
                      @elseif($expense->declinedon !== NULL)
                      <td><span class = "bg-red rounded-full uppercase p-2 text-white font-normal">Declined</span></td>
                      @elseif($expense->approvedon !== NULL)
                      <td><span class = "bg-green rounded-full uppercase p-2 text-white font-normal">Approved</span></td>
                      @endif
                      <td>
    
                        <div class="btn-group" role="group" aria-label="Basic example">
                           @if($expense->approved == 1)
                           <a href="{{ url('/agent/expense/decline',['id' =>$expense->id ])}}" class="btn btn-danger">Decline</a>
                           @else
                           <a href="{{ url('/agent/expense/approve',['id' =>$expense->id ])}}" class="btn btn-primary">Approve</a>
                           @endif()
                      
                         <edit-expense :expense="{{$expense}}" :rentals="{{ json_encode(Auth::user()->listings) }}"></edit-expense>
                         <delete-item url="/agent/expense/{{$expense->id}}"></delete-item>
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




 <!--   <div class="flex flex-col m-4">
        <div class="flex justify-between items-center my-4">
            <div class="w-full">
              <div class="flex items-center">
                <div class="left-table w-full my-4 mx-4">
                  <div class="container mx-auto flex justify-between items-center w-full my-2">
                    <div><p class="uppercase font-semibold text-lg text-blue-dark underline">expenses</p></div>
                    <div><new-expense :rentals="{{ json_encode(Auth::user()->listings) }}" ></new-expense></div>
                  </div>
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
                          

                         <edit-expense :expense="{{$expense}}" :rentals="{{ json_encode(Auth::user()->listings) }}"></edit-expense>
                         <delete-item url="/agent/expense/{{$expense->id}}"></delete-item>
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
    </div>-->
@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#example1').DataTable( {
      dom: 'Bfrtip',
  buttons: [
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdfHtml5'
  ],
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