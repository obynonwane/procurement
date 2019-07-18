@extends('home')
@section('main')

<div class="content">
	@include('dashboard.headingtwo')
	@include('dashboard.errorSuccess')
	<div class="container">
		<div class="row">
			<div class="card  col-lg-12">
				<form method="post" action="{{url('submit_buyer')}}">
        			@csrf
        			
					<div class="card-header">
						<div class="card-title">Add A New Customer</div>
					</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="buyer_sname">Surname</label>
										<input type="text" class="form-control" name="buyer_sname" placeholder="Full name">
									</div>	
								</div>
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="buyer_fname">First Name</label>
										<input type="text" class="form-control" name="buyer_fname" placeholder="Full name">
									</div>	
								</div>
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="buyer_email">Email Address</label>
										<input type="email" class="form-control" name="buyer_email" placeholder="Enter Email">
									</div>	
								</div>
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="buyer_phone">Phone Number</label>
										<input type="text" class="form-control" name="buyer_phone" placeholder="Enter Phone">
									</div>	
								</div>
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="buyer_address">Contact Address</label>
										<input type="text" class="form-control" name="buyer_address" placeholder="Enter Adress">
									</div>	
								</div>

								
							</div>
						</div>
				<div class="card-action">
				<button type="submit" class="btn btn-success">Submit</button>
			   </div>
			</form>
			</div>
		</div>
	</div>
</div>
@endsection