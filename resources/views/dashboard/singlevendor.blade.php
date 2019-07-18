@extends('home')
@section('main')
<div class="content">
	@include('dashboard.headingtwo')	

    @include('dashboard.errorSuccess')


						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Vendor</h4>
										
									</div>
								</div>
								<div class="card-body">
								
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>SN</th>
													<th>Name</th>
													<th>Phone</th>
													<th>address</th>
                                                    <th>email</th>
                                                    

												</tr>
											</thead>
											
											<tbody>
												@php
											    $sn = 1;
											    @endphp
															
											   <tr>
											   		<td> {{$sn}} </td>
													<td>{{$vendor->name}}</td>
                                                    <td>{{$vendor->phone}}</td>
                                                    <td>{{$vendor->address}}</td>
                                                    <td>{{$vendor->email}}</td>
                                                    
												</tr>
												@php
											    $sn++;
											    @endphp
											
											</tbody>
											
										</table>
									</div>
								</div>
							</div>
								
							</div>

			
</div>



@endsection
