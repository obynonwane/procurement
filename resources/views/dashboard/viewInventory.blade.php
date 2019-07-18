@extends('home')
@section('main')

<div class="content">
	@include('dashboard.headingtwo')
	@include('dashboard.errorSuccess')

	<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">INVENTORY</h4>
										
									</div>
								</div>
								<div class="card-body">
							
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>SN</th>
													<th>Product</th>
													<th>Description</th>
													<th>Stock</th>
													<th>Selling Price</th>
													<th>Vendor</th>
													<th>Vendor Phone</th>
													<th>Vendor Address</th>
												</tr>
											</thead>
											
											<tbody>
												@php
											    $sn = 1;
											    @endphp
												@foreach ($inventory as $inventory)				
											   <tr>
											   		<td> {{$sn}} </td>
													<td>{{$inventory->name}}</td>
													<td>{{$inventory->description}}</td>
													<td>{{$inventory->stock}}</td>
													<td>{{$inventory->saling_price}}</td>
													<td>{{$inventory->vendor_name}}</td>
													<td>{{$inventory->phone}}</td>
													<td>{{$inventory->address}}</td>
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