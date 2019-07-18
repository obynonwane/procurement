@extends('home')
@section('main')

<div class="content">
	@include('dashboard.headingtwo')
	@include('dashboard.errorSuccess')


						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Proceed To Checkout	</h4>
										
									</div>
								</div>
								<div class="card-body">
								
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													
													<th>Name</th>
													<th>Description</th>
                                                    <th>Stock</th>
                                                    <th>Unit Price</th>
                                                   <th>Select QTY to sale</th>
													<th>Action</th>
												</tr>
											</thead>
											
											<tbody>
														
											   <tr>
											   		
													<td>{{$product->name}}</td>
													<td>{{$product->description}}</td>
                                                    <td>{{$product->stock}}</td>
                                                    <td>{{$product->saling_price}}</td>
                                                    <td>
                                                       <form action="{{route('cart.add')}}" method="POST">
                                                        @csrf

														<select id="qty" name="qty" class="form-control ">
														
															<?php $minstock = 1; ?>

															@for ($i = $minstock; $i <= $product->stock; $i++)
																<option value="{{ $i }}">{{ $i }}</option>
															@endfor
														</select> 

                                                        <!-- /<input type="number" name="qty" placeholder="Qty" class="form-control" required/> -->
														<input type="hidden" name="product_id" value="{{$product->id}}"/>
														</td> 
                                                       
                                                       
                                                    
                                                    </td>
													<td>
                                                   
                                                    <button type="submit" class="btn btn-success">Checkout</button>
                                                    
                                                                                                      
													</td>
												</tr>
                                                </form>
												
											</tbody>
											
										</table>
									</div>
								</div>
							</div>

							</div>

							 
    							
											
							
</div>

@endsection