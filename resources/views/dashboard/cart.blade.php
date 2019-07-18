@extends('home')
@section('main')

<div class="content">
	@include('dashboard.headingtwo')
	@include('dashboard.errorSuccess')
	

    <div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h1 class="card-title">
										In Your Shopping Cart: <span>{{$cartCount->count()}} Items</span>	
										<div class="col-md-3"> <div class="demo-icon"> <div class="icon-preview"><i class="fas fa-cart-arrow-down"></i></div> <div class="icon-class"><span>{{$cartCount->count()}} Items</span></div> </div> </div>
										</h1>
									</div>
								</div>
								<div class="card-body">
								
									<div class="table-responsive">
									<table class="table table-striped table-striped-bg-white mt-3">
										<thead>
											<tr>
												<th>SN</th>
												<th scope="col">Product</th>
												<th scope="col"><strike>N</strike>Price</th>
												<th scope="col">Quantity</th>
                                                <th scope="col"><strike>N</strike>Total</th>
												<th>Remove Item</th>
											</tr>
										</thead>
										<tbody>
												@php
											    $sn = 1;
											    @endphp
												@foreach ($cartCount as $cartItem)	
											<tr>
												<td> {{$sn}} </td>
												<td>{{$cartItem->product_name}}</td>
												<td><strike>N</strike>{{$cartItem->product_price}}</td>
												<td>{{$cartItem->product_qty}}</td>
												<td><strike>N</strike>{{$cartItem->product_price * $cartItem->product_qty }}</td>
												<td>
													<a href="{{route('cart.delete',['id'=>$cartItem->id])}}" >
														<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove Item">
															<i class="fa fa-times"></i>
														</button>
													</a>
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


							<div class="col-12 col-md-12 col-lg-12">
								<section class="text-center">
								<h1 >Cart Total</h1>
								<p><h2>Total: <strike>N</strike>{{$itemTotal}}</h2></p>

								<a href="{{route('select.customer')}}" class="btn btn-medium btn-success">
									<span class="text">Proceed With Purchase</span>
								</a>
								</section>

							</div>


                              
    							
											
							
</div>

@endsection