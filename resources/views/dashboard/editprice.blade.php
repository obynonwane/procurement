@extends('home')
@section('main')
<div class="content">
	@include('dashboard.headingtwo')
	@include('dashboard.errorSuccess')


	<div class="row">
		<div class="col-md-12">
			<div class="card">

				<div class="card-header">
					<div class="card-title">Update Product Selling Price(N)</div>
				</div>
				<form class="" action="{{route('product.updatePrice',['id'=>$product->id])}}" method="post">
        		@csrf
				<div class="card-body">
			
					<div class="row">
						<div class="col-md-4 col-lg-4">
							<div class="form-group">
								<label for="name">Product Name</label>
								<input type="text" name="name" class="form-control"  value="{{$product->name}}" disabled>
							</div>
						</div>

                        

							<div class="col-md-4 col-lg-4">
							<div class="form-group">
								<label for="description">Product description</label>
                                <textarea class="form-control" name="description"  rows="5" disabled >{{$product->description}}</textarea>
								
								
								
							</div>
						</div>

                        <div class="col-md-4 col-lg-4">
							<div class="form-group">
								<label for="name">Update The Selling Price Here</label>
								<input type="text" name="saling_price" class="form-control"  value="{{$product->saling_price}}">
							</div>
						</div>

					</div>
				</div>

				<div class="card-action">
					 <button type="submit" class="btn btn-success" name="button">
			            Update Price
			          </button>
					
					<a href="{{url('/assign_saling_price')}}" class="btn btn-default"> Back to all products</a>
					
				</div>
			</form>

			</div>

		</div>

	</div>


</div>


@endsection