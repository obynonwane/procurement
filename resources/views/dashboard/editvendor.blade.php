@extends('home')
@section('main')

<div class="content">
	@include('dashboard.headingtwo')
	@include('dashboard.errorSuccess')
	<div class="container">
		<div class="row">
			<div class="card  col-lg-12">
				<form method="post" action="{{route('vendor.update',['id'=>$vendors->id])}}">
               
        			@csrf
        			
					<div class="card-header">
						<div class="card-title">Update This vendor Details</div>
					</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="name">Full Name</label>
										<input type="text" class="form-control" name="vendor_name" placeholder="Full name" value="{{$vendors->name}}">
									</div>	
								</div>
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="email">Email Address</label>
										<input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{$vendors->email}}">
									</div>	
								</div>
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="phone">Phone Number</label>
										<input type="text" class="form-control" name="phone" placeholder="Enter Phone" value="{{$vendors->phone}}">
									</div>	
								</div>
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="adress">Address</label>
										<input type="text" class="form-control" name="address" placeholder="Enter Adress" value="{{$vendors->address}}">
									</div>	
								</div>
							</div>
						</div>
				<div class="card-action">
				<button type="Update Record" class="btn btn-success">Update Vendor</button>
			   </div>
			</form>
			</div>
		</div>
	</div>
</div>
@endsection