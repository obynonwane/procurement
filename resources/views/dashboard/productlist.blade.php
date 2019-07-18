@extends('home')
@section('main')

<div class="content">
	@include('dashboard.headingtwo')
	@include('dashboard.errorSuccess')


						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">LIST OF CREATED PRODUCTS	</h4>
										
									</div>
								</div>
								<div class="card-body">
									

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>SN</th>
													<th>Name</th>
													<th>Description</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											
											<tbody>
												@php
											    $sn = 1;
											    @endphp
												@foreach ($products as $product)				
											   <tr>
											   		<td> {{$sn}} </td>
													<td>{{$product->name}}</td>
													<td>{{$product->description}}</td>
													<td>
														<div class="form-button-action">
														@if(Auth::user()->role=='admin')
															<a href="{{route('products.edit',['id'=>$product->id])}}" >
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Product">
																<i class="fa fa-edit"></i>
															</button>
														   </a>
															<a href="{{route('product.destroy',['id'=>$product->id])}}" >
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Delete Product">
																<i class="fa fa-times"></i>
															</button>
															</a>
															@else
															<span style="color:green;">No Permission </span>
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