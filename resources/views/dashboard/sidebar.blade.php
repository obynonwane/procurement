<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../img/user_logo.png" alt="image profile" class="avatar-img rounded-circle">
							
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{Auth::user()->first_name}}
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard">
								<ul class="nav nav-collapse">
								
								@if (Route::has('register') && Auth::user()->role == 'admin')
                                <li>
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            	@endif
									
									
								</ul>
							</div>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#productmanagement">
								<i class="fas fa-layer-group"></i>
								<p>Manage Product List</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="productmanagement">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{url('/productlist')}}">
											<span class="sub-item">View All Products</span>
										</a>
									</li>

									<li>
										<a href="{{url('/trashed')}}">
											<span class="sub-item">View Deleted Products</span>
										</a>
									</li>
				
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#purchasemanagement">
								<i class="fas fa-layer-group"></i>
								<p>Purchase Management</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="purchasemanagement">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{url('/make-order')}}">
											<span class="sub-item">Make Purchase</span>
										</a>
									</li>
									<li>
										<a href="{{url('/view-orders')}}">
											<span class="sub-item">View Orders</span>
										</a>
									</li>
									<li>
										<a href="{{url('/orders-canceled')}}">
											<span class="sub-item">Canceled Orders</span>
										</a>
									</li>
				
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#salesmanagement">
								<i class="fas fa-th-list"></i>
								<p>Sales Management</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="salesmanagement">
								<ul class="nav nav-collapse">
									
									<li>
										<a href="{{url('/sales-product')}}">
											<span class="sub-item">View products</span>
										</a>
									</li>

									<li>
										<a href="{{url('/sales-history')}}">
											<span class="sub-item">Transaction History</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#inventorymgt">
								<i class="fas fa-pen-square"></i>
								<p>Inventory Management</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="inventorymgt">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{url('/inventory_quantity')}}">
											<span class="sub-item">View Inventory</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#invoicemgt">
								<i class="fas fa-table"></i>
								<p>Invoice Management</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="invoicemgt">
								<ul class="nav nav-collapse">
									<li>
										<a href="tables/tables.html">
											<span class="sub-item">Datatables one</span>
										</a>
									</li>
									<li>
										<a href="tables/datatables.html">
											<span class="sub-item">Datatables two</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						@if(Auth::user()->role=='admin')
							<li class="nav-item">
							<a data-toggle="collapse" href="#vendormgt">
								<i class="fas fa-table"></i>
								<p>Vendor Management</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="vendormgt">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{url('/vendors')}}">
											<span class="sub-item">View All Vendors</span>
										</a>
									</li>
									<li>
										<a href="{{url('/addvendor')}}">
											<span class="sub-item">Add New Vendor</span>
										</a>
									</li>

									<li>
										<a href="{{url('/trashed_vendor')}}">
											<span class="sub-item">View Deleted Vendors</span>
										</a>
									</li>
								</ul>
							</div>
						</li>	
						@endif

							<li class="nav-item">
							<a data-toggle="collapse" href="#buyermgt">
								<i class="fas fa-table"></i>
								<p>Customers Management</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="buyermgt">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{url('/buyers')}}">
											<span class="sub-item">View All Customer</span>
										</a>
									</li>
									<li>
										<a href="{{url('/addbuyer')}}">
											<span class="sub-item">Add New Customer</span>
										</a>
									</li>

									<li>
										<a href="{{url('/trashed_buyer')}}">
											<span class="sub-item">Deleted Customers</span>
										</a>
									</li>
								</ul>
							</div>
						</li>	

					</ul>
				</div>
			</div>
		</div>