@extends('home')
@section('main')

<div class="content">
	@include('dashboard.headingtwo')
	@include('dashboard.errorSuccess')


						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Products, Stocks and Selling Prices	</h4>
										
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
                                                    <th>Stock</th>
                                                    <th>Unit Price</th>
                                                   
													<th>Action</th>
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
                                                    <td>{{$product->stock}}</td>
                                                    <td>{{$product->saling_price}}</td>
                                                    
													<td>
                                                    @if(($product->saling_price != 0) && ($product->stock != 0))

                                                    <a class="btn btn-success" href="{{route('product.single',['id'=>$product->id])}}" >Proceed With Sales</a>
                                                    
                                                    @else
                                                    <a class="btn btn-warning" >You cant Sale this Product Check if Its Availbale or Have the right price</a>

                                                    @endif
                                                    
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