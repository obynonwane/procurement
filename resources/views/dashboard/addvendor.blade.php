@extends('home')
@section('main')

<div class="content">
	@include('dashboard.headingtwo')
	@include('dashboard.errorSuccess')
	<div class="container">
		<div class="row">
			<div class="card  col-lg-12">
				<form method="post" action="{{url('addVendor')}}">
        			@csrf
        			
					<div class="card-header">
						<div class="card-title">Add A vendor</div>
					</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="name">Full Name</label>
										<input type="text" class="form-control" name="vendor_name" placeholder="Full name">
									</div>	
								</div>
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="email">Email Address</label>
										<input type="email" class="form-control" name="email" placeholder="Enter Email">
									</div>	
								</div>
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="phone">Phone Number</label>
										<input type="text" class="form-control" name="phone" placeholder="Enter Phone">
									</div>	
								</div>
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="adress">Address</label>
										<input type="text" class="form-control" name="address" placeholder="Enter Adress">
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