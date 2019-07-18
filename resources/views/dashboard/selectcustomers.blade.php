@extends('home')
@section('main')

<div class="content">
<form method="post" action="{{ route('updatecart') }}">
                                @csrf
	@include('dashboard.headingtwo')
	@include('dashboard.errorSuccess')
	<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h1 class="card-title">
										Select The Customer below if a returning Customer else <a href="{{url('/addbuyer')}}" target = "_blanck" class="btn btn-default">Add New Customer</a> <p></p>
										<span class="container">

										 

										<div class="table-responsive">
									
									</div>
										</span>	
										<div class="col-md-3"> <div class="demo-icon"> <div class="icon-preview"><i class="fas fa-cart-arrow-down"></i></div> <div class="icon-class"><span>{{$cartCount->count()}} Items</span></div> </div> </div>
										</h1>
									</div>
								</div>
								<div class="card-body">
                                
                                <table class="table table-striped table-striped-bg-white mt-3">
										<thead>
											<tr>
												
												<th style="font-size:15px;">
												
													Select Customer Details
                                                    <span class = "text-sm" style="color:blue;">
                                                         confirm If This Details Belong this Customer Before Proceeding else if this is a new customer :
                                                            <a href="{{url('/addbuyer')}}" target = "_blanck" class="btn btn-white">Add New Customer</a>
                                                    </span>

												</th>
												
												
											</tr>
										</thead>
										<tbody>
												
											<tr>
										<td>
											<select class="form-control form-control-md" name="buyer_id" style="color:green; font-size:20px;">
												@foreach ($customers as $customer) 
													<option value="{{$customer->id}}" >
														{{$customer->buyer_fname}}  {{$customer->buyer_sname}} - Phone: {{$customer->buyer_phone}}  - Email: {{$customer->buyer_email}}
                                                       
													</option> 
												@endforeach
											</select>

										</td>

               
													                                             
											</tr>
												
										</tbody>
									</table>

								</div>
							</div>

							</div>


							<div class="col-12 col-md-12 col-lg-12">
								<section class="text-center">
								<h1 >Cart Total</h1>
								<p><h2>Total: <strike>N</strike>{{$itemTotal}}</h2></p>

								
                                <button class="btn btn-success">Proceed To Payment Page</button>
								</section>

							</div>
                            </form>
		
</div>

@endsection