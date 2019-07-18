@extends('home')
@section('main')
<div class="content">
	@include('dashboard.headingtwo')	



	<div class="container-fluid">
		<br><br>

    <h2 align="center">Place Orders (Make Purchase)</h2> 

   

    <form action="{{ route('submitMorePurchase') }}" method="POST">

        @csrf

   

        @include('dashboard.errorSuccess')

   

        <table class="table table-bordered" id="dynamicTable">  

            <tr>

                <th>Product</th>
                <th>Vendor</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Total Price</th>
                <th>Date Ordered</th>
                <th>Date Expected</th>           
                <th>Add More</th>

            </tr>

            <tr>  

                <td>
                <select class="form-control form-control-sm" name="product[0][product_id]" required >
                @foreach ($products as $product)		
                    <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
                </select>
                </td>  
                <td>
                <select class="form-control form-control-sm" name="product[0][vendor_id]" required>
                @foreach ($vendors as $vendor)		
                    <option value="{{$vendor->id}}">{{$vendor->vendor_name}}</option>
                @endforeach
                </select>
                </td> 

                <td><input type="number" name="product[0][qty]" placeholder="Qty" class="form-control" required/></td> 

                <td><input type="number" name="product[0][unit_price]" placeholder="Unit price" class="form-control" required/></td>  

                <td><input type="number" name="product[0][total_price]" placeholder="Total Price" class="form-control" required/></td>  

                <td><input type="date" name="product[0][date_ordered]" placeholder="date Ordered" class="form-control" /></td>  

                <td><input type="date" name="product[0][date_expected]" placeholder="date Expected" class="form-control" /></td>
                
                
                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  

                

            </tr>  

        </table> 

    

        <button type="submit" class="btn btn-success">Save</button>

    </form>

</div>

   

<script type="text/javascript">

   

    var i = 0;

       

    $("#add").click(function(){

   

        ++i;

   

        $("#dynamicTable")
            .append(
                
            '<tr><td><select class="form-control form-control-sm" name="product['+i+'][product_id]" required >@foreach ($products as $product) <option value="{{$product->id}}">{{$product->name}}</option> @endforeach</select></td> <td><select class="form-control form-control-sm" name="product['+i+'][vendor_id]" required>@foreach ($vendors as $vendor)<option value="{{$vendor->id}}">{{$vendor->vendor_name}}</option>@endforeach</select></td><td><input type="number" name="product['+i+'][qty]" placeholder="Qty" class="form-control" required/></td><td><input type="number" name="product['+i+'][unit_price]" placeholder="Unit price" class="form-control" required/></td><td><input type="number" name="product['+i+'][total_price]" placeholder="Total Price" class="form-control" required/></td> <td><input type="date" name="product['+i+'][date_ordered]" placeholder="date Ordered" class="form-control" /></td> <td><input type="date" name="product['+i+'][date_expected]" placeholder="date Expected" class="form-control" /></td> <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'

            )
         });

   

    $(document).on('click', '.remove-tr', function(){  

         $(this).parents('tr').remove();

    });  

   

</script>

</div>


@endsection