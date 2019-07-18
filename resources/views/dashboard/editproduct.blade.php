@extends('home')
@section('main')
<div class="content">
	@include('dashboard.headingtwo')
	@include('dashboard.errorSuccess')


	<div class="row">
		<div class="col-md-12">
			<div class="card">

				<div class="card-header">
					<div class="card-title">Update Product</div>
				</div>
				<form class="" action="{{route('product.update',['id'=>$product->id])}}" method="post">
        		@csrf
				<div class="card-body">
			
					<div class="row">
						<div class="col-md-3 col-lg-3">
							<div class="form-group">
								<label for="name">Product Name</label>
								<input type="text" name="name" class="form-control"  value="{{$product->name}}">
							</div>
						</div>

							<div class="col-md-3 col-lg-3">
							<div class="form-group">
								<label for="description">Product description</label>
								<textarea class="form-control" name="description"  rows="5" >{{$product->description}}</textarea>
							</div>
							</div>

							<div class="col-md-3 col-lg-3">
							<div class="form-group">
								<label for="description">Stock Available</label>
								<input type="number" name="stock" class="form-control"  value="{{$product->stock}}">
							</div>
							</div>

							<div class="col-md-3 col-lg-3">
							<div class="form-group">
								<label for="description">vendor</label>
								<select class="form-control" name="vendor_id">
									@foreach($vendor2 as $vendor2)
										<option value="{{$vendor2->id}}"{{$vendor->id == $vendor2->id ? 'selected="selected"' : '' }}>{{$vendor2->vendor_name}}</option>
									@endforeach
								</select>
							</div>
							</div>

					</div>
				</div>

				<div class="card-action">
					 <button type="submit" class="btn btn-success" name="button">
			            Update post
			          </button>
					
					<a href="{{url('/productlist')}}" class="btn btn-default"> Back to all products</a>
					
				</div>
			</form>

			</div>

		</div>

	</div>


</div>


@endsection