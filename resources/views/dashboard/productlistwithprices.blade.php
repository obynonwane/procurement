@extends('home')
@section('main')

<div class="content">
	@include('dashboard.headingtwo')
	@include('dashboard.errorSuccess')


						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">PRODUCTS AND SELLING PRICES	</h4>
										
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
                                                    <th>Unit selling Price(N)</th>
                                                    
													<th>Change Selling Price(N)</th>
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
                                                    <td><strike>N</strike> {{$product->saling_price}}</td>
                                                    
													<td>
														<div class="form-button-action">
														@if(Auth::user()->role == 'admin')
															<a href="{{route('products.editprice',['id'=>$product->id])}}" >
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Update Product selling Price">
																<i class="fa fa-edit"></i>
															</button>
														   </a>
														   @else
														   <span style="color:green;">You dont have permission</span> 
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