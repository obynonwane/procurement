@extends('home')
@section('main')

<div class="content">
	@include('dashboard.headingtwo')
	@include('dashboard.errorSuccess')
	<div class="container">
		<div class="row">
			<div class="card  col-lg-12">
				<form method="post" action="{{route('buyer.update',['id'=>$buyers->id])}}">
        			@csrf
        			
					<div class="card-header">
						<div class="card-title">Edit and Update the Customer details</div>
					</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="buyer_sname">Surname</label>
										<input type="text" class="form-control" value="{{$buyers->buyer_sname}}" name="buyer_sname" placeholder="Full name">
									</div>	
								</div>
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="buyer_fname">First Name</label>
										<input type="text" class="form-control" value="{{$buyers->buyer_fname}}" name="buyer_fname" placeholder="Full name">
									</div>	
								</div>
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="buyer_email">Email Address</label>
										<input type="email" class="form-control" value="{{$buyers->buyer_email}}" name="buyer_email" placeholder="Enter Email">
									</div>	
								</div>
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="buyer_phone">Phone Number</label>
										<input type="text" class="form-control"  name="buyer_phone" value="{{$buyers->buyer_phone}}" placeholder="Enter Phone">
									</div>	
								</div>
								<div class="col-md-6 col-lg-12">
									<div class="form-group">
										<label for="buyer_address">Contact Address</label>
										<input type="text" class="form-control" value="{{$buyers->buyer_address}}" name="buyer_address" placeholder="Enter Adress">
									</div>	
								</div>

								
							</div>
						</div>
				<div class="card-action">
				<button type="submit" class="btn btn-success">Update</button>
			   </div>
			</form>
			</div>
		</div>
	</div>
</div>
@endsection