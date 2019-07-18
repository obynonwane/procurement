@extends('home')
@section('main')

<div class="content">
	@include('dashboard.headingtwo')
	@include('dashboard.errorSuccess')


						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">TRANSACTION HISTORY	</h4>
										
									</div>
								</div>
								<div class="card-body">
									

									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>SN</th>
													<th>Product</th>
													<th>Quantity</th>
                                                    <th>Unit Price</th>
													<th>Amount Collected</th>
                                                    <th>Date Sold</th>
                                                    <th>Sales person</th>
                                                    <th>Sales person Email</th>
                                                    <th>View Buyer</th>
												</tr>
											</thead>
											
											<tbody>
												@php
											    $sn = 1;
											    @endphp
												@foreach ($sales as $sale)				
											   <tr>
											   		<td> {{$sn}} </td>
													<td>{{$sale->product_name}}</td>
													<td>{{$sale->product_qty}}</td>
                                                    <td>{{$sale->product_price}}</td>
                                                    <td>{{$sale->sub_total}}</td>
                                                    <td>{{$sale->created_at}}</td>
                                                    <td>{{$sale->first_name}}  {{$sale->surname}}</td>
                                                    <td>{{$sale->email}}</td>
													<td>
														<div class="form-button-action">
													
															<a href="{{route('products.edit',['id'=>$sale->buyer_id])}}" >
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="See Buyer">
																<i class="fa fa-edit"></i>
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