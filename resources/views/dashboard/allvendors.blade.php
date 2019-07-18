@extends('home')
@section('main')

<div class="content">
	@include('dashboard.headingtwo')
	@include('dashboard.errorSuccess')

	<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">LIST OF VENDORS</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Add Row
										</button>
									</div>
								</div>
								<div class="card-body">
							
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>SN</th>
													<th>Name</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Address</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											
											<tbody>
												@php
											    $sn = 1;
											    @endphp
												@foreach ($vendors as $vendor)				
											   <tr>
											   		<td> {{$sn}} </td>
													<td>{{$vendor->vendor_name}}</td>
													<td>{{$vendor->email}}</td>
													<td>{{$vendor->phone}}</td>
													<td>{{$vendor->address}}</td>
													<td>
														<div class="form-button-action">
															<a href="{{route('vendor.edit',['id'=>$vendor->id])}}" >
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Vendor">
																<i class="fa fa-edit"></i>
															</button>
														   </a>
															<a href="{{route('vendor.destroy',['id'=>$vendor->id])}}" >
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Delete Vendor">
																<i class="fa fa-times"></i>
															</button>
															</a>
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