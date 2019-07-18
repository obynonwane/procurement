@extends('home')
@section('main')
<div class="content">
	@include('dashboard.headingtwo')	

    @include('dashboard.errorSuccess')


						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">List of Orders Made	</h4>
										
									</div>
								</div>
								<div class="card-body">
								
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>SN</th>
													<th>items</th>
													<th>Description</th>
													<th>Qty</th>
                                                    <th>Unit Price</th>
                                                    <th>Total</th>
                                                    <th>Date Orderd</th>
                                                    <th>Date Expected</th>
                                                    <th>Complete Order</th>
                                                    <th>Cancel Order</th>
                                                   

												</tr>
											</thead>
											
											<tbody>
												@php
											    $sn = 1;
											    @endphp
												@foreach ($purchases as $purchase)				
											   <tr>
											   		<td> {{$sn}} </td>
													   <td><a data-toggle="tooltip" title="Click to View Vendor!" href="{{route('vendor.view',['id'=>$purchase->vendor_id])}}" >{{$purchase->name}}</a></td>
													<td>{{$purchase->description}}</td>
                                                    <td>{{$purchase->qty}}</td>
                                                    <td>{{$purchase->unit_price}}</td>
                                                    <td>{{$purchase->total_price}}</td>
                                                    <td>{{$purchase->date_ordered}}</td>
                                                    <td>{{$purchase->date_expected}}</td>
                                                    <td><a class="btn btn-success" href="{{route('purchase.complete',['id'=>$purchase->id])}}" >Received</a></td>
                                                    <td><a class="btn btn-danger" href="{{route('purchase.cancel',['id'=>$purchase->id])}}" >Cancel</a></td>
                                                    
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
								<h1>Total Amount of Order Made: N{{$sum_total}}</h1>
							</div>

			
</div>



@endsection
