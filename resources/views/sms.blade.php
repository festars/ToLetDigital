@extends('layouts.main2')

@section("page-title", "BulkSMS")
@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header border-0">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="mb-0">Bulk SsMS</h3>
					</div> 
					<div class="col text-right"></div></div></div> 
					<div class="card-body">
						<form method="post" action="/agent/sendsms" entype="multipart/form-data">
							@csrf
							 <h6 class="heading-small text-muted mb-4">Bulk SMS</h6>
						 <div class="pl-lg-4">
						 	<div class="form-group focused">
						 		<label>Enter Text Message</label> 
						 		<textarea rows="4" placeholder="Hello" name="message" required="required" class="form-control form-control-alternative"></textarea>
						 	</div></div> 
						 	<div class="pl-lg-4">
						 		<div class="form-group">
						 			<label>Enter Phone Numbers</label> 
						 			<textarea rows="4" placeholder="+25470000000,+2547220000000" name="phones" class="form-control form-control-alternative"></textarea>
						 		</div></div> 
						 		<div class="pl-lg-4">
						 			<div class="form-group focused"><label>Attach Phone Number</label> <input type="file" name="phonefiles" class="form-control form-control-alternative"></div></div> 

						 			<button type="submit" class="btn btn-success">Send</button>
						 		</form>
						 	</div>
						 </div>
						</div>
					</div>

@endsection