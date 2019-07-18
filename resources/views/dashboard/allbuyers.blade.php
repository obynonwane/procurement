@extends('home')
@section('main')

<div class="content">
	@include('dashboard.headingtwo')
	@include('dashboard.errorSuccess')

	<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">LIST OF CUSTOMERS</h4>
										
									</div>
								</div>
								<div class="card-body">
							
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>SN</th>
													<th>First name</th>
													<th>Surname</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Address</th>
													<th>Action</th>
												</tr>
											</thead>
											
											<tbody>
												@php
											    $sn = 1;
											    @endphp
												@foreach ($buyers as $buyer)				
											   <tr>
											   		<td> {{$sn}} </td>
													<td>{{$buyer->buyer_fname}}</td>
													<td>{{$buyer->buyer_sname}}</td>
													<td>{{$buyer->buyer_email}}</td>
													<td>{{$buyer->buyer_phone}}</td>
													<td>{{$buyer->buyer_address}}</td>
													<td>
														<div class="form-button-action">
															<a href="{{route('buyer.edit',['id'=>$buyer->id])}}" >
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Buyer">
																<i class="fa fa-edit"></i>
															</button>
														   </a>
														   @if(Auth::user()->role=='admin')
															<a href="{{route('buyer.destroy',['id'=>$buyer->id])}}" >
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Delete Customer">
																<i class="fa fa-times"></i>
															</button>
															</a>
															@endif

														</div>
													</td>
												</tr>
												@php
											    $sn++;
											    @endphp
												@endforeach
											</tbody>
											
										</table>
									</div>
								</div>
							</div>

							</div>


</div>
@endsection